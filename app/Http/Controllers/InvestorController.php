<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function dashboard(){
        $users = User::where('id', auth()->id())->get();
        return view('investor.dashboard', ['users' => $users]);
    }
    public function markets(){
        $stocks = Stock::all();
        return view('investor.markets', ['stocks' => $stocks]);
    }
    public function portfolio(){
        $portfolio = Portfolio::where('user_id', auth()->id())->get();
        $stocks = Stock::all();
    
        foreach ($portfolio as $portfolioItem) {
            $stock = Stock::find($portfolioItem->stock_id);
    
            // Get the current market price of the stock
            $marketPrice = $stock->current_purchaseprice;
    
            // Calculate profit/loss
            $purchasePrice = $portfolioItem->purchase_price;
            $profitLoss = $marketPrice - $purchasePrice;
    
            // Add the profit/loss value to the portfolio item
            $portfolioItem->profit_loss = $profitLoss;
        }
        return view('investor.portfolio', ['portfolio' => $portfolio, 'stocks' => $stocks]);
    }
    
    public function buyStock(Request $request)
    {
        $stockId = $request->input('stock_id');
        $quantity = $request->input('quantity');
        $stock = Stock::findOrFail($stockId);
        $stockName = $stock->stock_name;
        $purchasePrice = $stock->current_purchaseprice;
    
        //Checks if investor has enough balance to make the purchase
        $totalCost = $stock->current_purchaseprice * $quantity;
        if ($totalCost > auth()->user()->balance) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
    
        // Find the investor's portfolio for the given stock
        $portfolio = Portfolio::where('user_id', auth()->id())
            ->where('stock_id', $stockId)
            ->first();
    
        if ($portfolio) {
            // The stock already exists in the portfolio, update the quantity and purchase price
            $newQuantity = $portfolio->quantity + $quantity;
            $newTotalCost = ($portfolio->quantity * $portfolio->purchase_price) + ($quantity * $purchasePrice);
            $portfolio->update([
                'quantity' => $newQuantity,
                'purchase_price' => $newTotalCost / $newQuantity, // Calculate new average purchase price
            ]);
        } else {
            // The stock doesn't exist in the portfolio, create a new entry
            $portfolio = Portfolio::create([
                'user_id' => auth()->id(),
                'stock_id' => $stockId,
                'stock_name' => $stockName,
                'quantity' => $quantity,
                'purchase_price' => $purchasePrice,
            ]);
        }
    
        // Update the quantity in the market
        $stock->quantity -= $quantity;
        $stock->save();
    
        // Update investor's balance
        $newBalance = auth()->user()->balance - $totalCost;
        auth()->user()->update(['balance' => $newBalance]);
    
        // Find the user who owns the stock and add the purchased stock price to their balance
        $stockOwner = User::find($stock->user_id);
        $stockOwner->balance += $totalCost;
        $stockOwner->save();
    
        return redirect('/investor/dashboard');
    }
    public function sellStock(Request $request, $stockId){
        $quantity = $request->input('quantity');
        $stock = Portfolio::where('user_id', auth()->id())->where('stock_id', $stockId)->first();
    
        // Check if the investor owns enough quantity of the stock to sell
        if (!$stock || $quantity <= 0 || $quantity > $stock->quantity) {
            return redirect()->back()->with('error', 'Invalid quantity');
        }
    
        // Get the current market price of the stock
        $marketPrice = Stock::where('id', $stockId)->value('current_purchaseprice');
    
        // Calculate the total value of the stocks being sold
        $totalValue = $marketPrice * $quantity;
    
        // Find the stock owner's user ID from the stock table
        $stockOwnerUserId = Stock::where('id', $stockId)->value('user_id');
    
        // Update the investor's portfolio (remove the sold stocks)
        $stock->quantity -= $quantity;
        $stock->save();
    
        // Update the investor's balance (add the total value of the sold stocks)
        $user = User::find(auth()->id());
        $user->balance += $totalValue;
        $user->save();
    
        // Update the stock owner's balance (deduct the total value of the sold stocks)
        $stockOwner = User::find($stockOwnerUserId);
        $stockOwner->balance -= $totalValue;
        $stockOwner->save();
    
        // Update the stock in the market (add the sold stocks)
        $marketStock = Stock::find($stockId);
        $marketStock->quantity += $quantity;
        $marketStock->save();
    
        // If the quantity in the portfolio becomes zero, remove the stock from the portfolio
        if ($stock->quantity <= 0) {
            $stock->delete();
        }

    
        return redirect()->route('investor.dashboard')->with('success', 'Stocks sold successfully.');
    }
    
    

}