<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\SearchController;
use App\HTTP\Controllers\ShopController;
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
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/',[HomeController::class,'index'])->name('user.home');
Route::get('shop/products/{id}',[HomeController::class,'ProductDetails'])->name('user.productdetail');
Route::get('shop/brand/{id}',[ShopController::class,'Brand'])->name('user.brand');
Route::get('shop/sale',[ShopController::class,'Sale'])->name('user.sale');
Route::get('/search',[SearchController ::class,'getSearchAjax']);
Route::post('/search',[SearchController ::class,'postSearchAjax'])->name('search');


Route::group(['prefix' => 'women'], function() {
    Route::get('/',[ShopController::class, 'shopWomen'])->name('shop.women');
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/{id}',[ShopController::class, 'CategoriesWomen'])->name('categories.women');
        Route::get('producttypes/{id}',[ShopController::class, 'ProductTypesWomen'])->name('producttypes.women');
    });
});




Route::group(['prefix' => 'men'], function() {
    Route::get('/',[ShopController::class, 'shopMen'])->name('shop.men');
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/{id}',[ShopController::class, 'CategoriesMen'])->name('categories.men');
        Route::get('producttypes/{id}',[ShopController::class, 'ProductTypesMen'])->name('producttypes.men');
        
    });
});

Route::group(['middleware' => ['auth:web']], function(){
    Route::get('like/{id?}',[HomeController::class,'like'])->name('user.like');
    
    Route::get('/profile/{id}',[HomeController::class,'Profile'])->name('user.profile');
    Route::get('/profile/edit/{id}',[HomeController::class,'showeditProfile'])->name('user.profile.edit');
    Route::post('/profile/edit/{id}',[HomeController::class,'editProfile'])->name('profile.edit.post');
    Route::get('/profile/change-password/{id}',[HomeController::class,'showChange'])->name('user.profile.change');
    Route::post('/profile/change-password/{id}',[HomeController::class,'changePassword'])->name('profile.change.post');
    Route::post('/profile/upload',[HomeController ::class,'upload'])->name('upload');
    Route::post('/cart/{id}',[HomeController::class,'addCart'])->name('user.cart.post');
    Route::get('/cart',[HomeController::class,'showCart'])->name('user.cart');
    Route::get('/cart/delete/{id}',[HomeController::class,'deleteCart'])->name('user.cart.delete');
   
    Route::post('/checkout',[HomeController::class,'Checkout'])->name('user.checkout.post');

    Route::get('/favourite',[HomeController::class,'favourite'])->name('user.favourite');
    Route::get('/favourite/{id}',[HomeController::class,'addFavourite'])->name('user.favourite.add');
    Route::get('/favourite/delete/{id}',[HomeController::class,'deleteFavourite'])->name('user.favourite.delete');

    Route::get('/purchase-history',[HomeController::class,'Order'])->name('user.order');
    Route::get('/order-details',[HomeController::class,'OrderDetails'])->name('user.orderdetails');
    Route::get('/order-details/{id}',[HomeController::class,'OrderDetailsId'])->name('user.orderdetailsid');
    Route::post('/comment/{id}',[HomeController ::class,'Comment'])->name('comment');

    
});


Auth::routes();