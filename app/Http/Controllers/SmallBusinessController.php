<?php

namespace App\Http\Controllers;

use App\Models\Businessinformation;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class SmallBusinessController extends Controller
{
public function dashboard() {
    $businessinfos = Businessinformation::where('user_id', auth()->id())->get();
    $users = User::where('id', auth()->id())->get();
    return view('smallbusiness.dashboard', ['businessinfos' => $businessinfos, 'users' => $users]);
    }
public function addStock(){
    return view('smallbusiness.addstocks');
}
public function viewStock(){
    $stocks = Stock::where('user_id', auth()->id())->get();
    return view('smallbusiness.viewstocks', ['stocks' => $stocks]);
}
public function editBusinessinformation(){
    return view('smallbusiness.businessinformation');
}
public function smallBusinessinfo(){
    $businessinfos = Businessinformation::where('user_id', auth()->id())->get();
    $users = User::where('id', auth()->id())->get();
    return view('smallbusiness.dashboard', ['businessinfos' => $businessinfos, 'users' => $users]);
}
}