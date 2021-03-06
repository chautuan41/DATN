<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::group(['prefix' => '/'], function () {

    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.handle.login');

    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');



    Route::group(['middleware' => ['auth:admin']], function(){
        
        

        Route::get('/',[Admin\AdminController::class,'indexAdmin'])->name('admin.index');
        Route::get('layout/{id}',[Admin\AdminController::class,'indexLayoutAdmin'])->name('admin.indexLayoutAdmin');
        Route::get('watches',[Admin\AdminController::class,'indexAdminDH'])->name('admin.indexDH');
        Route::get('clothing',[Admin\AdminController::class,'indexAdminCL'])->name('admin.indexCL');
        Route::get('warehouse',[Admin\AdminController::class,'indexAdminWH'])->name('admin.indexWH');

        Route::get('seller',[Admin\AdminController::class,'indexAdminSL'])->name('admin.indexSL');
        //sale
        Route::group(['prefix' => 'sale'], function() {
            Route::get('/',[Admin\SaleController::class,'index'])->name('admin.sale');
            Route::get('order',[Admin\SaleController::class,'order'])->name('sale.order');
            Route::get('orderdetail/edit/{id}',[Admin\SaleController::class,'showeditorderDetails'])->name('sale.orderdetail.edit');
            Route::post('orderdetail/edit/{id}',[Admin\SaleController::class,'editorderDetails'])->name('sale.orderdetail.post');
            Route::get('orderdetail/delete/{id}',[Admin\SaleController::class,'deleteorderDetails'])->name('sale.orderdetail.delete');
            Route::get('orderdetail/{id}',[Admin\SaleController::class,'orderDetails'])->name('sale.orderdetail');
            Route::get('order-tracking',[Admin\SaleController::class,'orderTracking'])->name('sale.ordertracking');
            Route::get('order-tracking/{id}',[Admin\SaleController::class,'orderTrackingDetails'])->name('sale.ordertracking.get');
            Route::get('processed/{id}',[Admin\SaleController::class,'processed'])->name('sale.processed');
            Route::get('confirm/{id}',[Admin\SaleController::class,'confirm'])->name('sale.confirm');
        });
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

        // -- Seller -- //
        Route::group(['prefix' => 'seller'], function() {
            Route::get('information/{id_staff}',[Admin\AdminController::class,'personalInfoSL'])->name('admin.personalInfoSL');
            Route::post('information/{id_staff}',[Admin\AdminController::class,'handlePersonalInfoSL'])->name('admin.handlePersonalInfoSL');
            Route::get('changepw/{id_staff}',[Admin\AdminController::class,'formChangePWSL'])->name('admin.formChangePWSL');
            Route::post('changepw/{id_staff}',[Admin\AdminController::class,'handleChangePWSL'])->name('admin.handleChangePWSL');
            Route::get('cart',[Admin\CartController::class,'index'])->name('admin.cart');
            Route::get('cart/{id}',[Admin\CartController::class,'invoicedetails'])->name('admin.cart.get');
            Route::get('processed/{id}',[Admin\CartController::class,'processed'])->name('admin.cart.post');
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

            Route::get('product-images/{product_id}',[Admin\ProductController::class, 'images'])->name('admin.images');
            Route::get('delete-product-images/{product_id}',[Admin\ProductController::class, 'deleteImages'])->name('admin.deleteImages');
            Route::post('add-product-images/{product_id}',[Admin\ProductController::class, 'addImages'])->name('admin.addImages');

            Route::get('product-sizes/{product_id}',[Admin\ProductController::class, 'sizes'])->name('admin.sizes');
            Route::get('delete-product-sizes/{product_id}',[Admin\ProductController::class, 'deleteSizes'])->name('admin.deleteSizes');
            Route::get('hide-product-sizes/{product_id}',[Admin\ProductController::class, 'hideSizes'])->name('admin.hideSizes');
            Route::post('add-product-sizes/{product_id}',[Admin\ProductController::class, 'handleAddSizes'])->name('admin.handleAddSizes');
            
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
            Route::get('inventory',[Admin\ImportInvoiceController::class,'productWH'])->name('admin.inventory');
            Route::get('iistaff',[Admin\ImportInvoiceController::class,'listIIStaff'])->name('admin.listIIStaff');

            Route::get('waitfor',[Admin\ImportInvoiceController::class,'listWaitIInvoices'])->name('admin.listWaitIInvoices');
            Route::get('confirm/{id_input}',[Admin\ImportInvoiceController::class,'confirmInvoices'])->name('admin.confirmInvoices');
            Route::get('size/{id}',[Admin\ImportInvoiceController::class,'size'])->name('admin.size');
            Route::get('sku/{id}',[Admin\ImportInvoiceController::class,'sku'])->name('admin.sku');
            Route::get('pro/{id}',[Admin\ImportInvoiceController::class,'pro']);
            Route::get('add',[Admin\ImportInvoiceController::class,'formAddIInvoices'])->name('admin.formAddIInvoices');
            Route::post('add',[Admin\ImportInvoiceController::class,'handleAddIInvoices'])->name('admin.handleAddIInvoices');
            Route::post('handle',[Admin\ImportInvoiceController::class,'xulycreatectsp'])->name('admin.xulycreatectsp');
            Route::get('edit/{id_input}',[Admin\ImportInvoiceController::class,'formEditIInvoices'])->name('admin.formEditIInvoices');
            Route::post('edit/{id_input}',[Admin\ImportInvoiceController::class,'handleEditIInvoices'])->name('admin.handleEditIInvoices');
            Route::get('delete/{id_input}',[Admin\ImportInvoiceController::class,'deleteIInvoices'])->name('admin.deleteIInvoices');
            Route::get('search',[Admin\ImportInvoiceController::class,'searchIInvoices'])->name('admin.searchIInvoices');

            Route::get('add-p',[Admin\ImportInvoiceController::class, 'addProduct'])->name('admin.addProduct');
            Route::post('add-p',[Admin\ImportInvoiceController::class, 'handleaddProduct'])->name('admin.handleaddProduct');

            Route::get('ii/{id}',[Admin\ImportInvoiceController::class,'hdDetails'])->name('ii.order.get');
            Route::get('ii1/{id}',[Admin\ImportInvoiceController::class,'hdDetails1'])->name('ii.order.get1');
        });
        // -- Ouput Invoices -- //
        Route::group(['prefix' => 'output-invoice'], function() {
            Route::get('/',[Admin\InvoiceController::class,'listOInvoices'])->name('admin.listOInvoices');
            Route::get('search',[Admin\InvoiceController::class,'searchOInvoices'])->name('admin.searchOInvoices');
        });

        
    });
    

});
