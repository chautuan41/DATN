<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::group(['prefix' => '/'], function () {

    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.handle.login');

    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('cart',[Admin\CartController::class,'index'])->name('admin.cart');


    Route::group(['middleware' => ['auth:admin']], function(){
        
        
        Route::get('/',[Admin\AdminController::class,'indexAdmin'])->name('admin.index');
        Route::get('layout/{id}',[Admin\AdminController::class,'indexLayoutAdmin'])->name('admin.indexLayoutAdmin');
        Route::get('watches',[Admin\AdminController::class,'indexAdminDH'])->name('admin.indexDH');
        Route::get('clothing',[Admin\AdminController::class,'indexAdminCL'])->name('admin.indexCL');
        Route::get('warehouse',[Admin\AdminController::class,'indexAdminWH'])->name('admin.indexWH');

        Route::get('cart',[Admin\CartController::class,'index'])->name('admin.cart');
        Route::get('cart/{id}',[Admin\CartController::class,'invoicedetails'])->name('admin.cart.get');
        Route::get('processed/{id}',[Admin\CartController::class,'processed'])->name('admin.cart.post');

        // -- Admin -- //
        Route::group(['prefix' => 'admin'], function() {
            Route::get('information/{id_admin}',[Admin\AdminController::class,'personalInfo'])->name('admin.personalInfo');
            Route::post('information/{id_admin}',[Admin\AdminController::class,'handlePersonalInfo'])->name('admin.handlePersonalInfo');
            Route::get('changepw/{id_admin}',[Admin\AdminController::class,'formChangePW'])->name('admin.formChangePW');
            Route::post('changepw/{id_admin}',[Admin\AdminController::class,'handleChangePW'])->name('admin.handleChangePW');
        });
        // -- Clothing -- //
        Route::group(['prefix' => 'clothing'], function() {
            Route::get('information/{id_staff}',[Admin\AdminController::class,'personalInfoCL'])->name('admin.personalInfoCL');
            Route::post('information/{id_staff}',[Admin\AdminController::class,'handlePersonalInfoCL'])->name('admin.handlePersonalInfoCL');
            Route::get('changepw/{id_staff}',[Admin\AdminController::class,'formChangePWCL'])->name('admin.formChangePWCL');
            Route::post('changepw/{id_staff}',[Admin\AdminController::class,'handleChangePWCL'])->name('admin.handleChangePWCL');
        });
        // -- Watches -- //
        Route::group(['prefix' => 'watches'], function() {
            Route::get('information/{id_staff}',[Admin\AdminController::class,'personalInfoWC'])->name('admin.personalInfoWC');
            Route::post('information/{id_staff}',[Admin\AdminController::class,'handlePersonalInfoWC'])->name('admin.handlePersonalInfoWC');
            Route::get('changepw/{id_staff}',[Admin\AdminController::class,'formChangePWWC'])->name('admin.formChangePWWC');
            Route::post('changepw/{id_staff}',[Admin\AdminController::class,'handleChangePWWC'])->name('admin.handleChangePWWC');
        });
        // -- WareHouse -- //
        Route::group(['prefix' => 'warehouse'], function() {
            Route::get('information/{id_staff}',[Admin\AdminController::class,'personalInfoWH'])->name('admin.personalInfoWH');
            Route::post('information/{id_staff}',[Admin\AdminController::class,'handlePersonalInfoWH'])->name('admin.handlePersonalInfoWH');
            Route::get('changepw/{id_staff}',[Admin\AdminController::class,'formChangePWWH'])->name('admin.formChangePWWH');
            Route::post('changepw/{id_staff}',[Admin\AdminController::class,'handleChangePWWH'])->name('admin.handleChangePWWH');
        });

        // -- Account -- //
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
            Route::get('resetpw/{id_staff}',[Admin\AccountController::class,'resetPW'])->name('admin.resetPW');
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

        // -- Product -- //
        Route::group(['prefix' => 'product'], function() {
            Route::get('/',[Admin\ProductController::class, 'listProduct'])->name('admin.listProduct');
            Route::get('add',[Admin\ProductController::class, 'formAddProduct'])->name('admin.formAddProduct');
            Route::post('add',[Admin\ProductController::class, 'handleAddProduct'])->name('admin.handleAddProduct');
            Route::get('delete/{product_id}',[Admin\ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');
            Route::get('edit/{product_id}',[Admin\ProductController::class, 'formEditProduct'])->name('admin.formEditProduct');
            Route::post('edit/{product_id}',[Admin\ProductController::class, 'handleEditProduct'])->name('admin.handleEditProduct');
            Route::get('search',[Admin\ProductController::class,'searchProduct'])->name('admin.searchProduct');
            // Route::group(['prefix' => 'laravel-filemanager', 'middleware'] , function () {
            //     \UniSharp\LaravelFilemanager\Lfm::routes();
            // });
            // Route::delete('delete-img/{id}',[Admin\ProductController::class,'destroy'])->name('admin.destroy');
        });
        
        // -- Product Brand -- //
        Route::group(['prefix' => 'brand'], function() {
            Route::get('/',[Admin\BrandController::class,'listBrand'])->name('admin.listBrand');
            Route::get('add',[Admin\BrandController::class,'formAddBrand'])->name('admin.formAddBrand');
            Route::post('add',[Admin\BrandController::class,'handleAddBrand'])->name('admin.handleAddBrand');
            Route::get('delete/{id_brand}',[Admin\BrandController::class,'deleteBrand'])->name('admin.deleteBrand');
            Route::get('edit/{id_brand}',[Admin\BrandController::class,'formEditBrand'])->name('admin.formEditBrand');
            Route::post('edit/{id_brand}',[Admin\BrandController::class,'handleEditBrand'])->name('admin.handleEditBrand');
            Route::get('search',[Admin\BrandController::class,'searchBrand'])->name('admin.searchBrand');
        });
        
        // -- Supplier -- //
        Route::group(['prefix' => 'supplier'], function() {
            Route::get('/',[Admin\SupplierController::class,'listSupplier'])->name('admin.listSupplier');
            Route::get('add',[Admin\SupplierController::class,'formAddSupplier'])->name('admin.formAddSupplier');
            Route::post('add',[Admin\SupplierController::class,'handleAddSupplier'])->name('admin.handleAddSupplier');
            Route::get('delete/{id_supplier}',[Admin\SupplierController::class,'deleteSupplier'])->name('admin.deleteSupplier');
            Route::get('edit/{id_supplier}',[Admin\SupplierController::class,'formEditSupplier'])->name('admin.formEditSupplier');
            Route::post('edit/{id_supplier}',[Admin\SupplierController::class,'handleEditSupplier'])->name('admin.handleEditSupplier');
            Route::get('search',[Admin\SupplierController::class,'searchSupplier'])->name('admin.searchSupplier');
        });

        // -- Categories -- //
        Route::group(['prefix' => 'categories'], function() {
            Route::get('/',[Admin\CategoriesController::class,'listCategories'])->name('admin.listCategories');
            Route::get('add',[Admin\CategoriesController::class,'formAddCategories'])->name('admin.formAddCategories');
            Route::post('add',[Admin\CategoriesController::class,'handleAddCategories'])->name('admin.handleAddCategories');
            Route::get('delete/{id_cgr}',[Admin\CategoriesController::class,'deleteCategories'])->name('admin.deleteCategories');
            Route::get('edit/{id_cgr}',[Admin\CategoriesController::class,'formEditCategories'])->name('admin.formEditCategories');
            Route::post('edit/{id_cgr}',[Admin\CategoriesController::class,'handleEditCategories'])->name('admin.handleEditCategories');
            Route::get('search',[Admin\CategoriesController::class,'searchCategories'])->name('admin.searchCategories');
        });

        // -- Product Type -- //
        Route::group(['prefix' => 'product-type'], function() {
            Route::get('/',[Admin\ProductTypeController::class,'listProductType'])->name('admin.listProductType');
            Route::get('add',[Admin\ProductTypeController::class,'formAddProductType'])->name('admin.formAddProductType');
            Route::post('add',[Admin\ProductTypeController::class,'handleAddProductType'])->name('admin.handleAddProductType');
            Route::get('delete/{id_ProT}',[Admin\ProductTypeController::class,'deleteProductType'])->name('admin.deleteProductType');
            Route::get('edit/{id_ProT}',[Admin\ProductTypeController::class,'formEditProductType'])->name('admin.formEditProductType');
            Route::post('edit/{id_ProT}',[Admin\ProductTypeController::class,'handleEditProductType'])->name('admin.handleEditProductType');
            Route::get('search',[Admin\ProductTypeController::class,'searchProductType'])->name('admin.searchProductType');
        });

        // -- Comments -- //
        Route::group(['prefix' => 'comment'], function() {
            Route::get('/',[Admin\CommentController::class,'listComment'])->name('admin.listComment');
            Route::get('list-cofirm',[Admin\CommentController::class,'listConfirmComment'])->name('admin.listConfirmComment');
            Route::get('confirm/{id_comment}',[Admin\CommentController::class,'confirmComment'])->name('admin.confirmComment');
            Route::get('cancel/{id_comment}',[Admin\CommentController::class,'cancelComment'])->name('admin.cancelComment');
            Route::get('hard-delete/{id_comment}',[Admin\CommentController::class,'hardDeleteCmt'])->name('admin.hardDeleteCmt');
            Route::get('list-cofirm/search',[Admin\CommentController::class,'searchComment'])->name('admin.searchComment');
        });

        // -- Input Invoices -- //
        Route::group(['prefix' => 'input-invoice'], function() {
            Route::get('/',[Admin\ImportInvoiceController::class,'listIInvoices'])->name('admin.listIInvoices');
            Route::get('waitfor',[Admin\ImportInvoiceController::class,'listWaitIInvoices'])->name('admin.listWaitIInvoices');
            Route::get('add',[Admin\ImportInvoiceController::class,'formAddIInvoices'])->name('admin.formAddIInvoices');
            Route::post('add',[Admin\ImportInvoiceController::class,'handleAddIInvoices'])->name('admin.handleAddIInvoices');
            Route::get('edit/{id_input}',[Admin\ImportInvoiceController::class,'formEditIInvoices'])->name('admin.formEditIInvoices');
            Route::post('edit/{id_input}',[Admin\ImportInvoiceController::class,'handleEditIInvoices'])->name('admin.handleEditIInvoices');
            Route::get('delete/{id_input}',[Admin\ImportInvoiceController::class,'deleteIInvoices'])->name('admin.deleteIInvoices');
            Route::get('search',[Admin\ImportInvoiceController::class,'searchIInvoices'])->name('admin.searchIInvoices');
        });
        // -- Ouput Invoices -- //
        Route::group(['prefix' => 'output-invoice'], function() {
            Route::get('/',[Admin\InvoiceController::class,'listOInvoices'])->name('admin.listOInvoices');
            Route::get('search',[Admin\InvoiceController::class,'searchOInvoices'])->name('admin.searchOInvoices');
        });

        
    });
    

});
