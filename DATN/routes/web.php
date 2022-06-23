<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\HomeController;
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
Route::get('/products/{id}',[HomeController::class,'ProductDetails'])->name('user.product');



Auth::routes();