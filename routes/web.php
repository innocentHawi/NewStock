<?php

use App\Models\Stock;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\SmallBusinessController;
use App\Http\Controllers\BusinessinformationController;
use App\Models\Businessinformation;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//landing page
Route::get('/', function () {
    return view('landingpage');
})->name('landpage.dashboard');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/smallbusiness/dashboard', [SmallBusinessController::class, 'dashboard'])->name('smallbusiness.dashboard');
Route::get('/investor/dashboard', [InvestorController::class, 'dashboard'])->name('investor.dashboard');

//takes to the login and registration dashboard
Route::get('/dashboard', function () {
    return view('login');
})->name('login.dashboard');
Route::get('/register', function () {
    return view('register');
})->name('register.dashboard');


//Stock-dashboard related route
Route::post('add-stock', [StockController::class, 'addStock']);
//Business-dashboard related route
Route::post('edit-businessinformation', [BusinessinformationController::class, 'editBusinessinformation']);

//investor get routes
Route::get('/investor/markets', [InvestorController::class, 'markets'])->name('investor.markets');
Route::get('/investor/portfolio', [InvestorController::class, 'portfolio'])->name('investor.portfolio');
Route::get('/trade-shares', [InvestorController::class, 'tradeShares'])->name('trade-shares');
//admin get routes
Route::get('/admin/markets', [AdminController::class, 'markets'])->name('admin.markets');
Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
Route::get('/admin/deleteuser', [AdminController::class, 'deleteUser'])->name('admin.deleteuser');
//smallbusiness get routes
Route::get('/smallbusiness/viewstocks', [SmallBusinessController::class, 'viewStock'])->name('smallbusiness.viewstocks');
Route::get('/smallbusiness/addstocks', [SmallBusinessController::class, 'addStock'])->name('smallbusiness.addstocks');
Route::get('/smallbusiness/businessinformation', [SmallBusinessController::class, 'editBusinessinformation'])->name('smallbusiness.businessinformation');

//edit stock-viewstock daashboard
Route::get('/edit-stock/{stock}', [StockController::class, 'showEditScreen']);
Route::put('/edit-stock/{stock}', [StockController::class, 'updateStock']);
Route::delete('/delete-stock/{stock}', [StockController::class, 'deleteStock']);


//new
Route::post('/buy-stock', [InvestorController::class, 'buyStock'])->name('buy-stock');
//admin update Investor balance
Route::get('/update-balance/{user}', [UserController::class, 'showBalanceScreen']);
Route::put('/update-balance/{user}', [UserController::class, 'updateBalance']);

//return to smallbusiness page
Route::get('/smallbusiness', function () {
    $businessinfos = Businessinformation::where('user_id', auth()->id())->get();
    $users = User::where('id', auth()->id())->get();
    return view('smallbusiness.dashboard', ['businessinfos' => $businessinfos, 'users' => $users]);
})->name('smallbusiness page');
//admin's delete
Route::delete('/admindelete-stock/{stock}', [StockController::class, 'admindeleteStock']);
Route::delete('/admindelete-user/{user}', [UserController::class, 'admindeleteUser']);

//return to admin page
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin page');
Route::get('/investor', function () {
    return view('investor.dashboard');
})->name('investor page');

//smallBusiness info 
Route::get('/smallbusiness/dashboard', [SmallBusinessController::class, 'smallBusinessinfo'])->name('smallbusiness.dashboard');
//new
Route::post('/sell-stock/{stock_id}', [InvestorController::class, 'sellStock'])->name('sell-stock');

