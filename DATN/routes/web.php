<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\HomeController;
use App\Models\ProductType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/',[HomeController::class,'index'])->name('user.home');
Route::get('/products/{id}',[HomeController::class,'ProductDetails'])->name('user.productdetail');
Route::get('/shop',[HomeController::class,'Shop'])->name('user.shop');
Route::get('/shop/{id}',[HomeController::class,'ProductTypes'])->name('user.producttype');
Route::get('/profile/{id}',[HomeController::class,'Profile'])->name('user.profile');
Route::get('/cart', function () {
    $dtProT = ProductType::all();
    return view('user.pages.cart',compact('dtProT'));
});
Route::get('/checkout', function () {
    $dtProT = ProductType::all();
    return view('user.pages.checkout',compact('dtProT'));
});
Route::get('/purchase-history', function () {
    $dtProT = ProductType::all();
    return view('user.pages.order',compact('dtProT'));
});

Auth::routes();