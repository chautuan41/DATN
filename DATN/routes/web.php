<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\SearchController;
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

Route::get('/search',[SearchController ::class,'getSearchAjax']);
Route::post('/search',[SearchController ::class,'postSearchAjax'])->name('search');

Route::group(['middleware' => ['auth:web']], function(){
    Route::get('/profile/{id}',[HomeController::class,'Profile'])->name('user.profile');
    Route::post('/profile/{id}',[HomeController::class,'editProfile'])->name('user.profile.edit');
    Route::post('/cart/{id}',[HomeController::class,'addCart'])->name('user.cart.post');
    Route::get('/checkout',[HomeController::class,'showCheckout'])->name('user.checkout');
    Route::post('/checkout',[HomeController::class,'Checkout'])->name('user.checkout.post');
    Route::get('/purchase-history',[HomeController::class,'Order'])->name('user.order');
    Route::post('/comment/{id}',[HomeController ::class,'Comment'])->name('comment');
});


Auth::routes();