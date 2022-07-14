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
use App\Models\Picture;


class ProductController extends Controller
{
    //
    public function listProduct(){
        $lsProduct = Product::all();
        $images = Picture::all();
        return view('dashboard.product.list_product',compact('lsProduct','images'));
    }

    public function formAddProduct()
   {
        $dtB = Brand::all();
        $dtS = Supplier::all();
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        return view('dashboard.product.add_product',compact('dtC','dtB','dtS','dtProT'));
   }

   public function handleAddProduct(Request $req)
   {
       $Pro = new Product();
       $Pro->sku = $req->sku;
       $Pro->product_name = $req->product_name;
       $Pro->description = $req->description;
       $Pro->gender = $req->gender;
       $Pro->price = $req->price;
       $Pro->amount = $req->amount;
       $Pro->discount = $req->discount;
       $Pro->like = $req->like;
       $Pro->categories = $req->categories;
       $Pro->product_type = $req->product_type;
       $Pro->supplier = $req->supplier;
       $Pro->brand = $req->brand;

        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $req->sku.'.'.$extension;
            $file_name= 'images/shop/product/'.$filename;
            $file->move('images/shop/product/',$filename);
            $Pro->image = $file_name;
        }
        $Pro -> save();

        if($req->hasfile("pictures")){
            $files = $req->file('pictures');
            $i=1;
            foreach($files as $file){
                $imageName = $req->sku.'-'.$i++.'.'.$file->getClientOriginalExtension();
                $imageName= 'images/shop/product/picture/'.$imageName;
                $req['product'] = $Pro->id;
                $req['link']=$imageName;
                $file->move('images/shop/product/picture/',$imageName);
                Picture::create($req->all());
            }
        }
      
       $dtPro = Product::all();
      return redirect()->route('admin.listProduct',compact('dtPro'));
   }


   public function formEditProduct($product_id)
   {
       $dt = Product::find($product_id);
       $dtProT = ProductType::all();
        $dtB = Brand::all();
        $dtS = Supplier::all();
        $dtC = Categories::all();
        $images = Picture::all();
       return view('dashboard.product.edit_product',compact('dt','dtProT','dtB','dtS','dtC','images'));
   }

   public function handleEditProduct(Request $req, $product_id){       
        // $checkProduct = Product::where('product_id',$req->product_id)->first();
        // if($checkProduct == true){
        //     return redirect()->back()->with("error","Product already exists");
        // }
        
       $Pro = Product::find($product_id);
       $Pro->sku = $req->sku;
       $Pro->product_name = $req->product_name;
       $Pro->description = $req->description;
       $Pro->gender = $req->gender;
       $Pro->price = $req->price;
       $Pro->amount = $req->amount;
       $Pro->discount = $req->discount;
       $Pro->like = $req->like;
       $Pro->categories = $req->categories;
       $Pro->product_type = $req->product_type;
       $Pro->supplier = $req->supplier;
       $Pro->brand = $req->brand;

       if($req->hasfile('image')){
        $file = $req->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = $req->sku.'.'.$extension;
        $file_name= 'images/shop/product/'.$filename;
        $file->move('images/shop/product/',$filename);
        $Pro->image = $file_name;
    }
       $Pro -> save();

       if($req->hasfile("pictures")){
        $files = $req->file('pictures');
        $i=1;
        foreach($files as $file){
            $imageName = $req->sku.'-'.$i++.'.'.$file->getClientOriginalExtension();
            $imageName= 'images/shop/product/picture/'.$imageName;
            $req['product'] = $Pro->id;
            $req['link']=$imageName;
            $file->move('images/shop/product/picture/',$imageName);
            Picture::create($req->all());
        }
    }

       $dtPro = Product::all();

      return redirect()->route('admin.listProduct',compact('dtPro'));
   }

   public function deleteProduct($id){       
       $Pro = Product::find($id);
       $Pro -> status = 0;
       $Pro -> save();
       $dtPro = DB::table('products')->where('status','=','1')->get();    
       return redirect()->route('admin.listProduct',compact('dtPro'));
   } 
   public function searchProduct(){
        $search_text=$_GET['query'];
        $lsProduct=Product::where('sku','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.product.list_product',compact('lsProduct'));
    }

    // public function destroy($id){
    //     $Pro = Product::findOrFail($id);

    //     if(File::exists("image/".$Pro->image)){
    //         File::delete("image/".$Pro->image);
    //     }

    //     $pictures = Pictures::where("product",$Pro->id)->get();

    //     foreach($pictures as $pic){
    //         if(File::exists("pictures/".$pic->link)){
    //             File::delete("pictures/".$pic->link);
    //         }
    //     }
    //     $Pro->delete();
    //     return back();
    // }

}
