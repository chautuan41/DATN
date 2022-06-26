<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Models\ProductType;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\Categories;

class ProductController extends Controller
{
    //
    public function index(){
        $dtPro = Product::all();
        return view('dashboard.product.index',compact('dtPro'));
    }

   function showCreate()
   {
        
        $dtB = Brand::all();
        $dtS = Supplier::all();
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        return view('dashboard.product.create',compact('dtC','dtB','dtS','dtProT'));
   }

   function create(Request $req){
       $Pro = new Product();
       $Pro->product_id = $req->product_id;
       $Pro->sku = $req->sku;
       $Pro->product_name = $req->product_name;
       $Pro->gender = $req->gender;
       $Pro->price = $req->price;
       $Pro->amount = $req->amount;
       $Pro->discount = $req->discount;
       $Pro->like = $req->like;
       $Pro->categories = $req->categories;
       $Pro->product_type = $req->product_type;
       $Pro->supplier = $req->supplier;
       $Pro->brand = $req->brand;
       $Pro->image = $req->image;
       $Pro -> save();
       $dtPro = Product::all();
      return redirect()->route('products',compact('dtPro'));
   }


   function showEdit($id)
   {
       $dt = Product::find($id);
       $dtProT = ProductType::all();
        $dtB = Brand::all();
        $dtS = Supplier::all();
        $dtC = Categories::all();
        
       return view('dashboard.product.edit',compact('dt','dtProT','dtB','dtS','dtC'));
   }

   function edit(Request $req, $id){       
       $Pro = Product::find($id);
       $Pro->product_id = $req->product_id;
       $Pro->sku = $req->sku;
       $Pro->product_name = $req->product_name;
       $Pro->gender = $req->gender;
       $Pro->price = $req->price;
       $Pro->amount = $req->amount;
       $Pro->discount = $req->discount;
       $Pro->like = $req->like;
       $Pro->categories = $req->categories;
       $Pro->product_type = $req->product_type;
       $Pro->supplier = $req->supplier;
       $Pro->brand = $req->brand;
       $Pro->image = $req->image;
       $Pro -> save();
       $dtPro = Product::all();

      return redirect()->route('products',compact('dtPro'));
   }

   function delete($id){       
       $Pro = Product::find($id);
       $Pro -> status = 0;
       $Pro -> save();
       $dtPro = DB::table('products')->where('status','=','1')->get();    
       return redirect()->route('products',compact('dtPro'));
   } 
}
