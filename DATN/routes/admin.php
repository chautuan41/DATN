<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::group(['prefix' => '/'], function () {

    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.handle.login');

    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function(){

        Route::get('/',[Admin\AdminController::class,'indexAdmin'])->name('admin.index');
        // Route::get('watches',[Admin\AdminController::class,'indexAdminDH'])->name('admin.indexDH');
        // Route::get('clothing',[Admin\AdminController::class,'indexAdminCL'])->name('admin.indexCL');
        // Route::get('seller',[Admin\AdminController::class,'indexAdminSL'])->name('admin.indexSL');

        //  Account
        // -- User -- //
        Route::group(['prefix' => 'user'], function() {
            Route::get('/',[Admin\AccountController::class,'listUser'])->name('admin.listUser');
            Route::get('add',[Admin\AccountController::class,'formAddUser'])->name('admin.formAddUser');
            Route::post('add',[Admin\AccountController::class,'handleAddUser'])->name('admin.handleAddUser');
            Route::get('delete/{id_user}',[Admin\AccountController::class,'deleteUser'])->name('admin.deleteUser');
            Route::get('edit/{id_user}',[Admin\AccountController::class,'formEditUser'])->name('admin.formEditUser');
            Route::post('edit/{id_user}',[Admin\AccountController::class,'handleEditUser'])->name('admin.handleEditUser');
            Route::get('search',[Admin\AccountController::class,'searchUser'])->name('admin.searchUser');
        });
    
        // -- Staff -- //
        Route::group(['prefix' => 'staff'], function() {
            Route::get('/',[Admin\AccountController::class,'listStaff'])->name('admin.listStaff');
            Route::get('add',[Admin\AccountController::class,'formAddStaff'])->name('admin.formAddStaff');
            Route::post('add',[Admin\AccountController::class,'handleAddStaff'])->name('admin.handleAddStaff');
            Route::get('delete/{id_staff}',[Admin\AccountController::class,'deleteStaff'])->name('admin.deleteStaff');
            Route::get('edit/{id_staff}',[Admin\AccountController::class,'formEditStaff'])->name('admin.formEditStaff');
            Route::post('edit/{id_staff}',[Admin\AccountController::class,'handleEditStaff'])->name('admin.handleEditStaff');
            Route::get('search',[Admin\AccountController::class,'searchStaff'])->name('admin.searchStaff');
        });

        // -- Role Type -- //
        Route::group(['prefix' => 'role'], function(){
            Route::get('/',[Admin\RoleController::class,'listRole'])->name('admin.listRole');
            Route::get('add',[Admin\RoleController::class,'formAddRole'])->name('admin.formAddRole');
            Route::post('add',[Admin\RoleController::class,'handleAddRole'])->name('admin.handleAddRole');
            Route::get('delete/{id_role}',[Admin\RoleController::class,'deleteRole'])->name('admin.deleteRole');
            Route::get('edit/{id_role}',[Admin\RoleController::class,'formEditRole'])->name('admin.formEditRole');
            Route::post('edit/{id_role}',[Admin\RoleController::class,'handleEditRole'])->name('admin.handleEditRole');
            Route::get('search',[Admin\RoleController::class,'searchRole'])->name('admin.searchRole');
        });

        //  Product
        Route::group(['prefix' => 'product'], function() {
            Route::get('/',[Admin\ProductController::class, 'listProduct'])->name('admin.listProduct');
            Route::get('add',[Admin\ProductController::class, 'formAddProduct'])->name('admin.formAddProduct');
            Route::post('add',[Admin\ProductController::class, 'handleAddProduct'])->name('admin.handleAddProduct');
            Route::get('delete/{product_id}',[Admin\ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');
            Route::get('edit/{product_id}',[Admin\ProductController::class, 'formEditProduct'])->name('admin.formEditProduct');
            Route::post('edit/{product_id}',[Admin\ProductController::class, 'handleEditProduct'])->name('admin.handleEditProduct');
            Route::get('search',[Admin\ProductController::class,'searchProduct'])->name('admin.searchProduct');
        });

        //  Product Brand
        Route::group(['prefix' => 'brand'], function() {
            Route::get('/',[Admin\BrandController::class,'listBrand'])->name('admin.listBrand');
            Route::get('add',[Admin\BrandController::class,'formAddBrand'])->name('admin.formAddBrand');
            Route::post('add',[Admin\BrandController::class,'handleAddBrand'])->name('admin.handleAddBrand');
            Route::get('delete/{id_brand}',[Admin\BrandController::class,'deleteBrand'])->name('admin.deleteBrand');
            Route::get('edit/{id_brand}',[Admin\BrandController::class,'formEditBrand'])->name('admin.formEditBrand');
            Route::post('edit/{id_brand}',[Admin\BrandController::class,'handleEditBrand'])->name('admin.handleEditBrand');
            Route::get('search',[Admin\BrandController::class,'searchBrand'])->name('admin.searchBrand');
        });
        
        //  Supplier
        Route::group(['prefix' => 'supplier'], function() {
            Route::get('/',[Admin\SupplierController::class,'listSupplier'])->name('admin.listSupplier');
            Route::get('add',[Admin\SupplierController::class,'formAddSupplier'])->name('admin.formAddSupplier');
            Route::post('add',[Admin\SupplierController::class,'handleAddSupplier'])->name('admin.handleAddSupplier');
            Route::get('delete/{id_supplier}',[Admin\SupplierController::class,'deleteSupplier'])->name('admin.deleteSupplier');
            Route::get('edit/{id_supplier}',[Admin\SupplierController::class,'formEditSupplier'])->name('admin.formEditSupplier');
            Route::post('edit/{id_supplier}',[Admin\SupplierController::class,'handleEditSupplier'])->name('admin.handleEditSupplier');
            Route::get('search',[Admin\SupplierController::class,'searchSupplier'])->name('admin.searchSupplier');
        });
    });
});             


        //  Product Type
        // Route::get('/pt/watches',[Admin\ProductTypeController::class,'ptWatches'])->name('admin.ptWatches');
        // Route::get('/pt/top',[Admin\ProductTypeController::class,'ptTop'])->name('admin.ptTop');
        // Route::get('/pt/bottom',[Admin\ProductTypeController::class,'ptBottom'])->name('admin.ptBottom');
