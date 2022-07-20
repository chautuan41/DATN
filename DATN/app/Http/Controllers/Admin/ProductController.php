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
use App\Models\Size;


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
    //dd($req->all());
       $Pro = new Product();
       $Pro->product_name = $req->product_name;
       $Pro->description = $req->description;
       $Pro->gender = $req->gender;
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


        if($req->has("images")){
            $i=1;
            foreach($req->file('images') as $image){
                $imageName = $req->sku.'-'.$i++.'.'.$image->getClientOriginalExtension();
                $imageName= 'images/shop/product/picture/'.$imageName;
                $image->move('images/shop/product/picture/',$imageName);
                Picture::create([
                    'product'=>$Pro->id,
                    'image'=>$imageName
                ]);

            }
        }
      
       $dtPro = Product::all();
      return redirect()->route('admin.listProduct',compact('dtPro'));
   }

   public function images($product_id){
        $Pro = Product::find($product_id);
        $IMG = Picture::all();
        return view('dashboard.product.all_image',compact('Pro','IMG'));
    }

    public function sizes($product_id){
        $Pro = Product::find($product_id);
        $Size = Size::all();
        return view('dashboard.product.size',compact('Pro','Size'));
    }
    public function deleteSizes($product_id){       
        $Size = Size::find($product_id)->forceDelete();
        $Pro = Product::find($product_id);
        $Size = Size::all();
        return redirect()->back()->with("success","Delete Successful");
    } 

    public function hideSizes($product_id){       
        $Size = Size::find($product_id);
        $Size -> status = 0;
        $Size -> save();  
        $Pro = Product::find($product_id);
        $Size = Size::all();
        return redirect()->back()->with("success","Delete Successful");
    }

    public function handleAddSizes(Request $request, $product_id)
    {
        $Pro = Product::find($product_id);
        $Size = Size::all();
        // Size::create([
        //     'product'=>$Pro->id,
        //     'size'=>$request->size,
        //     'status'=>1
        // ]);
        $Size = new Size();
        $Size->size = $request->size;
        $Size->product = $Pro->id;
        $Size -> save();
        return redirect()->back()->with("success","Add Size successful");
    }

    public function addImages(Request $req, $product_id){
        $Pro = Product::find($product_id);
        $IMG = Picture::all();
        if($req->has("images")){
            foreach($req->file('images') as $image){
                $imageName = $Pro['product_name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path("all_images"),$imageName);
                Picture::create([
                    'product'=>$Pro->id,
                    'image'=>$imageName
                ]);
            }
        }
        return redirect()->back()->with("success","Delete Successful");
    }
    
    public function deleteImages($product_id){
        $image = Picture::find($product_id)->forceDelete();
        $Pro = Product::find($product_id);
        $IMG = Picture::all();
    //    return view('dashboard.product.all_image',compact('Pro','IMG'));
        // return redirect()->route('admin.images',compact('Pro','IMG'));
        return redirect()->back()->with("success","Delete Successful");
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
       $Pro->product_name = $req->product_name;
       $Pro->description = $req->description;
       $Pro->gender = $req->gender;
       $Pro->price = $req->price;
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

       if($req->has("images")){
        $i=0;
        foreach($req->file('images') as $image){
            $imageName = $req->sku.'-'.$i++.'.'.$image->getClientOriginalExtension();
            $imageName= 'images/shop/product/picture/'.$imageName;
            $image->move('images/shop/product/picture/',$imageName);
            Picture::create([
                'product'=>$Pro->id,
                'image'=>$imageName
            ]);

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