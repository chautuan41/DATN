<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ProductTypeController extends Controller
{
    public function listProductType(){
        $lsProductType = ProductType::all();
        return view('dashboard.producttype.producttype',compact('lsProductType'));
    }
    public function formAddProductType(){
        $cate = Categories::all();
        return view('dashboard.producttype.add_ptype',compact('cate'));
    }

    public function handleAddProductType(Request $request)
    {
        $checkProductType = ProductType::where('product_type_name',$request->product_type_name)->first();
        if($checkProductType == true){
            return redirect()->back()->with("error","Product Type already exists");
        }
        $productType = new ProductType();
        $productType->product_type_name = $request->product_type_name;
        $productType->categories = $request->categories;
        $productType->status = 1;
        $productType->save();
        return redirect()->back()->with("success","Add Product Type successful");
    }
    public function deleteProductType($id_ProT){
        $productType = ProductType::find($id_ProT);
        $productType->status = 0;
        $productType->save();
        $lsProductType = ProductType::all();
        return redirect()->route('admin.listProductType');
    }
    public function formEditProductType($id_ProT){
        $lsProductType = ProductType::find($id_ProT);
        $cate = Categories::all();
        return view('dashboard.producttype.edit_ptype',compact('id_ProT','lsProductType','cate'));
    }
    public function handleEditProductType(Request $request, $id_ProT){
        // $checkProductType = ProductType::where('product_type_name',$request->product_type_name)->first();
        // if($checkProductType == true){
        //     return redirect()->back()->with("error","Product Type already exists");
        // }
        $productType = ProductType::find($id_ProT);
        $productType->product_type_name = $request->product_type_name;
        $productType->categories = $request->categories;
        $productType->save();
        return redirect()->route('admin.listProductType');
    }
    public function searchProductType(){
        $search_text=$_GET['query'];
        $lsProductType = ProductType::where('product_type_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.producttype.producttype',compact('lsProductType'));
    }
}
