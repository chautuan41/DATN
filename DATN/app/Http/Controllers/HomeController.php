<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $dtSP = Product::all();
        $dtPro = DB::table('products')->orderBy('id', 'desc')->get();
        //dd($dtSP);
        return view('user.index',compact('dtSP','dtPro'));
    }
    public function proDetails($id)
    {
        $dtPro = Product::find($id);
        //$dtProD = ProductDetail::find($id);
        $dtProT=ProductType::find($dtPro->product_type);
        $dtProD = DB::table('sizes')
        ->join('products', 'sizes.product', '=', 'products.id')
        ->where('products.id','=', $id)->get();
        //dd($dtProD);
        return view('user.productdetail',compact('dtProT','dtProD','dtPro'));
    }
}
