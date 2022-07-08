<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Account;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ShopController extends Controller
{
    //
    public function shopWomen()
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        //dtSP = Product::where('gender', 2)->get();
        //dd($dtSP);
        $dtProT = ProductType::all();

        $users = Product::where('status', 1)->get();

        $dtSP = $users->reject(function ($user) {
            return $user->gender === 0;
        })->map(function ($user) {
            return $user;
        });
        return view('user.pages.shop',compact('dtSP','dtProT','dtC','cart'));
    }
    public function shopMen()
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        //dtSP = Product::where('gender', 2)->get();
        //dd($dtSP);
        $dtProT = ProductType::all();

        $users = Product::where('status', 1)->get();

        $dtSP = $users->reject(function ($user) {
            return $user->gender === 1;
        })->map(function ($user) {
            return $user;
        });
        //dd($Pro);
        return view('user.pages.shop',compact('dtSP','dtProT','dtC','cart'));
    }
  
    public function CategoriesWomen($id)
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtB = DB::table('brands')->orderBy('brand_name', 'asc')->get();
        $dtCid = Categories::find($id);
        $dtPro = DB::table('product_types')
        ->join('products', 'products.product_type', '=', 'product_types.id')
        ->where('products.categories','=', $id)
        ->where('products.gender','=', 0)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.categories',compact('dtCid','dtProT','dtPro','dtC','cart','dtB'));
    }

    public function CategoriesMen($id)
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        $dtB = DB::table('brands')->orderBy('brand_name', 'asc')->get();
        $dtProT = ProductType::all();
        $dtCid = Categories::find($id);
        $dtPro = DB::table('product_types')
        ->join('products', 'products.product_type', '=', 'product_types.id')
        ->where('products.categories','=', $id)
        ->where('products.gender','=', 1)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.categories',compact('dtCid','dtProT','dtPro','dtC','cart','dtB'));
    }

    public function ProductTypesWomen($id)
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        $dtB = DB::table('brands')->orderBy('brand_name', 'asc')->get();
        $dtProT = ProductType::all();
        $dtProTid = ProductType::find($id);
        $dtPro = DB::table('product_types')
        ->join('products', 'products.product_type', '=', 'product_types.id')
        ->where('products.product_type','=', $id)
        ->where('products.gender','=', 0)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.producttype',compact('dtProTid','dtProT','dtPro','dtC','cart','dtB'));
    }

    public function ProductTypesMen($id)
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        $dtB = DB::table('brands')->orderBy('brand_name', 'asc')->get();
        $dtProT = ProductType::all();
        $dtProTid = ProductType::find($id);
        $dtPro = DB::table('product_types')
        ->join('products', 'products.product_type', '=', 'product_types.id')
        ->where('products.product_type','=', $id)
        ->where('products.gender','=', 1)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.producttype',compact('dtProTid','dtProT','dtPro','dtC','cart','dtB'));
    }

    public function Brand($id)
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        $dtB = DB::table('brands')->orderBy('brand_name', 'asc')->get();
        $dtProT = ProductType::all();
        $dtBid = Brand::find($id);
        $dtPro = DB::table('brands')
        ->join('products', 'products.brand', '=', 'brands.id')
        ->where('products.brand','=', $id)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.brand',compact('dtBid','dtProT','dtPro','dtC','cart','dtB'));
    }
}
