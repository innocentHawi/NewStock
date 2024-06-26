<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StockController extends Controller
{
    //Admin delete stock
    public function admindeleteStock(Stock $stock){
        $stock->delete();
        
        return redirect('/admin');
    } 

    //Small Business delete stock
    public function deleteStock(Stock $stock){
        if(auth()->user()->id === $stock['user_id']){
            $stock->delete();
        }
        return redirect('/smallbusiness');
    }
    public function updateStock(Stock $stock, Request $request){
        if(auth()->user()->id !== $stock['user_id']){
            return redirect('/');
        }
    
        $incomingFields = $request->validate([
            'current_purchaseprice' => 'required',
            'quantity' => 'required'
        ]);
    
        $incomingFields['current_purchaseprice'] = strip_tags($incomingFields['current_purchaseprice']);
        $incomingFields['quantity'] = strip_tags($incomingFields['quantity']);
    
        // Store the current purchase price as past2_purchaseprice
        $stock->past2_purchaseprice = $stock->past1_purchaseprice;
    
        // Store the past purchase price as past1_purchaseprice
        $stock->past1_purchaseprice = $stock->past_purchaseprice;
    
        // Store the current purchase price as past_purchaseprice
        $stock->past_purchaseprice = $stock->current_purchaseprice;
    
        $stock->update($incomingFields);
        return redirect('/smallbusiness');
    }

    
    public function showEditScreen(Stock $stock){
        if(auth()->user()->id !== $stock['user_id']){
            return redirect('/');
        }

        return view('smallbusiness.edit-stock', ['stock'=> $stock]);
    }
    public function addStock(Request $request){
        $incomingFields = $request->validate([
            'stock_name' => 'required',
            'current_purchaseprice' => 'required',
            'quantity' => 'required',
            'type' => ['required', Rule::in(['retail', 'fashion', 'food&bevarage', 'technology', 'media', 'craft'])]//new
        ]);

        $incomingFields['stock_name']=strip_tags($incomingFields['stock_name']);
        $incomingFields['current_purchaseprice']=strip_tags($incomingFields['current_purchaseprice']);
        $incomingFields['quantity']=strip_tags($incomingFields['quantity']);
        $incomingFields['type']=strip_tags($incomingFields['type']);//new
        $incomingFields['user_id'] = auth()->id();
        Stock::create($incomingFields);
        return redirect('/smallbusiness/addstocks');
    }
   
}