<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $dtSP = Product::all()->skip(0)->take(3);
        $dtProT = ProductType::all();
        $dtPro = DB::table('products')->orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        //dd($dtSP);
        return view('user.index',compact('dtSP','dtPro','dtProT'));
    }
    public function ProductDetails($id)
    {
        $dtProT = ProductType::all();
        $dtPro = Product::find($id);
        //$dtProD = ProductDetail::find($id);
        $dtProTid=ProductType::find($dtPro->product_type);
        $dtProD = DB::table('sizes')
        ->join('products', 'sizes.product', '=', 'products.id')
        ->where('products.id','=', $id)->get();
        //dd($dtProD);
        return view('user.pages.productdetail',compact('dtProTid','dtProT','dtProD','dtPro'));
    }
    public function Shop()
    {
        $dtSP = Product::all();
        $dtProT = ProductType::all();
        return view('user.pages.shop',compact('dtSP','dtProT'));
    }
    public function ProductTypes($id)
    {
        $dtProT = ProductType::all();
        $dtProTid = ProductType::find($id);
        $dtPro = DB::table('product_types')
        ->join('products', 'products.product_type', '=', 'product_types.id')
        ->where('products.product_type','=', $id)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.producttype',compact('dtProTid','dtProT','dtPro'));
    }
    public function Profile($id)
    {
        $dtProT = ProductType::all();
        $dtProF = Account::find($id);
        //dd($dtProF);
        return view('user.pages.profile',compact('dtProF','dtProT'));
    }
    // public function Cart($id)
    // {
    //     $dtProT = ProductType::all();
    //     $dtProF = Account::find($id);
    //     //dd($dtProF);
    //     return view('user.pages.profile',compact('dtProF','dtProT'));
    // }
    // public function Checkout($id)
    // {
    //     $dtProT = ProductType::all();
    //     $dtProF = Account::find($id);
    //     //dd($dtProF);
    //     return view('user.pages.profile',compact('dtProF','dtProT'));
    // }
    // public function Order($id)
    // {
    //     $dtProT = ProductType::all();
    //     $dtProF = Account::find($id);
    //     //dd($dtProF);
    //     return view('user.pages.profile',compact('dtProF','dtProT'));
    // }
    
}
