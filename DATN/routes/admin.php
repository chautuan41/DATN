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
    Route::get('seller',[Admin\AdminController::class,'indexAdminSL'])->name('admin.indexSL');

    //  Account
        // -- User -- //
    Route::get('/list/user',[Admin\AccountController::class,'listUser'])->name('admin.listUser');

        // -- Staff -- //
    Route::get('/list/staff',[Admin\AccountController::class,'listStaff'])->name('admin.listStaff');

    //  Clothing

    //  Watches

    //  Product
    Route::group(['prefix' => 'products'], function() {
        Route::get('/',[Admin\ProductController::class, 'index'])->name('products');
        Route::get('create',[Admin\ProductController::class, 'showCreate'])->name('products.create');
        Route::post('create',[Admin\ProductController::class, 'create'])->name('products.create.post');
        Route::get('edit/{ID}',[Admin\ProductController::class, 'showEdit'])->name('products.edit');
        Route::post('edit/{ID}',[Admin\ProductController::class, 'edit'])->name('products.edit.post');
        Route::get('delete/{ID}',[Admin\ProductController::class, 'delete'])->name('products.delete');
    });

    //  Product Type
    Route::get('/pt/watches',[Admin\ProductTypeController::class,'ptWatches'])->name('admin.ptWatches');
    Route::get('/pt/top',[Admin\ProductTypeController::class,'ptTop'])->name('admin.ptTop');
    Route::get('/pt/bottom',[Admin\ProductTypeController::class,'ptBottom'])->name('admin.ptBottom');

    //  Product Brand
    Route::get('/pd/clothing',[Admin\ProductBrandController::class,'pdClothing'])->name('admin.pdClothing');
    Route::get('/pd/watches',[Admin\ProductBrandController::class,'pdWatches'])->name('admin.pdWatches');

    //  Supplier
    Route::get('/supplier/clothing',[Admin\SupplierController::class,'supplierClothing'])->name('admin.supplierClothing');
    Route::get('/supplier/watches',[Admin\SupplierController::class,'supplierWatches'])->name('admin.supplierWatches');
});
});             