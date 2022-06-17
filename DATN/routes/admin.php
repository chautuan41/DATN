<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::group(['prefix' => '/'], function () {

 Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

 Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.handle.login');

 Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function(){

    Route::get('/',[Admin\AdminController::class,'indexAdmin'])->name('admin.index');
    Route::get('watches',[Admin\AdminController::class,'indexAdminDH'])->name('admin.indexDH');
    Route::get('clothing',[Admin\AdminController::class,'indexAdminCL'])->name('admin.indexCL');

});

});             