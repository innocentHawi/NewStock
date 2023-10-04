<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Investor;
use Illuminate\Http\Request;
use App\Models\SmallBusiness;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        $user = User::where('name', $incomingFields['loginname'])->first();

        if ($user && auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->isSmallBusiness()) {
                return redirect()->route('smallbusiness.dashboard');
            } elseif ($user->isInvestor()) {
                return redirect()->route('investor.dashboard');
            }
        }

        return redirect('/dashboard');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200'],
            'role' => ['required', Rule::in(['admin', 'small_business', 'investor'])]
        ]);
    
        // Check if the new user has the 'admin' role
        if ($incomingFields['role'] === 'admin') {
            // Count the number of existing 'admin' users
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount >= 2) {
                // If there are already two registered admins, return an error message or redirect back with a message.
                return redirect()->back()->with('error', 'Only two admins are allowed.');
            }
        }
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
    
        switch ($incomingFields['role']) {
            case 'admin':
                Admin::create(['user_id' => $user->id]);
                break;
            case 'small_business':
                SmallBusiness::create(['user_id' => $user->id]);
                break;
            case 'investor':
                Investor::create(['user_id' => $user->id]);
                break;
        }
        
        auth()->login($user);
        return redirect('/dashboard');
    }
    
    public function admindeleteUser(User $user){
        $user->delete();
        
        return redirect('/admin');
    }   
    //new
    public function showBalanceScreen(User $user){
       
        return view('admin.update-balance', ['user'=> $user]);
    }
    public function updateBalance(User $user, Request $request){

        $incomingFields = $request->validate([
            //'name' => 'required',
            'balance' => 'required',
            //'type' => 'required'
        ]);

        //$incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['balance'] = strip_tags($incomingFields['balance']);
        //$incomingFields['type'] = strip_tags($incomingFields['type']);

        $user->update($incomingFields);
        return redirect('/admin');
    } 
    
}