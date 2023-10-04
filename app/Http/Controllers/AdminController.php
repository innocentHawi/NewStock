<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard'); 
    }
    public function markets(){
        $stocks = Stock::all();
        return view('admin.markets', ['stocks' => $stocks]);
    }
    public function deleteUser(){
        $users = User::all();
        return view('admin.deleteuser', ['users' => $users]);
    }
   //new
   public function viewUsers(){
       $users = User::where('role', '!=', 'admin')->get();
       return view('admin.users', ['users' => $users]);
   }
   
}