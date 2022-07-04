<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;

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
        
        $dtProT = ProductType::all();
        $dtC = Categories::all();
        $cart = Count(Cart::all());
        
        //dd($a);
        $dtSP = Product::all()->skip(0)->take(3);
        $dtPro = DB::table('products')->orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        //dd($total);
        return view('user.index',compact('dtSP','dtPro','dtProT','dtC','cart'));
    }
    public function ProductDetails($id)
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtPro = Product::find($id);
        $cart = Count(Cart::all());
        //$dtProD = ProductDetail::find($id);
        $dtProTid=ProductType::find($dtPro->product_type);
        $dtProD = DB::table('sizes')
        ->join('products', 'sizes.product', '=', 'products.id')
        ->where('products.id','=', $id)->get();
        $dtCm=DB::table('comments')
        ->join('accounts', 'comments.account', '=', 'accounts.id')
        ->select('comments.status','comments.date_time','comments.comment','accounts.full_name','accounts.avatar')
        ->where('product','=', $id)
        ->get();
        //dd($dtProD);
        return view('user.pages.productdetail',compact('dtProTid','dtProT','dtProD','dtPro','dtC','cart','dtCm'));
    }
    public function Comment(Request $req, $id)
    {
        //dd($req->all());
        $dtCm= new Comment();
        $dtCm->comment = $req->comment;
        $dtCm->date_time = now();
        $dtCm->product = $id;
        $dtCm->account = $req->account;
        $dtCm->status = 0;
        $dtCm->save();
        
        return redirect()->route('user.productdetail', ['id' => $id]);
       
    }
    public function Shop()
    {
        $dtC = Categories::all();
        $dtSP = Product::all();
        $dtProT = ProductType::all();
        return view('user.pages.shop',compact('dtSP','dtProT','dtC'));
    }
    public function ProductTypes($id)
    {
        $cart = Count(Cart::all());
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtProTid = ProductType::find($id);
        $dtPro = DB::table('product_types')
        ->join('products', 'products.product_type', '=', 'product_types.id')
        ->where('products.product_type','=', $id)
        ->get();
        //dd($dtPro);
        
        return view('user.pages.producttype',compact('dtProTid','dtProT','dtPro','dtC','cart'));
    }
    public function Profile($id)
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtProF = Account::find($id);
        //dd($dtProF);
        return view('user.pages.profile',compact('dtProF','dtProT','dtC'));
    }

    public function Cart()
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();

   
        $dtCart = DB::table('carts')
        ->join('products','carts.product','=','products.id')
        ->where('account','=', Auth::user()->id)
        ->get();;
        
        return view('user.pages.cart',compact('dtCart','dtProT','dtC'));
    }
    public function addCart(Request $req, $id)
    {
       
        $pro=Product::find($id);
        $check = DB::table('carts')
        ->where('account','=', Auth::user()->id)
        ->where('product','=',$id)
        ->where('size','=',$req->size)
        ->get();

        if(count($check)>0){
            $cart=Cart::find($check[0]->id);
            $cart->quantity += $req->quantity;
            $cart->total = ($pro->discount != 0 ? $pro->discount : $pro->price) *$cart->quantity;
            $cart -> save();
        }
        else{
            $cart=new Cart();
            $cart->size=$req->size;
            $cart->quantity=$req->quantity;
            $cart->total = ($pro->discount != 0 ? $pro->discount : $pro->price) *$cart->quantity;
            $cart->account=Auth::user()->id;
            $cart->product=$id;
            $cart -> save();
        }
      
        return redirect()->route('user.checkout');
    }

    public function showCheckout()
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $cart = Count(Cart::all());
        $dtCart = DB::table('carts')
        ->join('products','carts.product','=','products.id')
        ->where('account','=', Auth::user()->id)
        ->get();
        
        return view('user.pages.checkout',compact('dtProT','dtC','dtCart','cart'));
    }
    public function checkout(Request $req)
    {
       
       //dd($req->all());
       $C = Cart::all();
       
       $Inv= Invoice::create([
            'date_time' => now(),
            'shipping_address' => $req->address,
            'total' => $req->total,
            'account' => $req->account,
            'status' => 0,
        ]);
        $n=count($C);
        for($i=0;$i<$n;$i++){
            InvoiceDetail::create([
                'amount' => $C[$i]->quantity,
                'size' => $C[$i]->size,
                'total' => $C[$i]->total,
                'invoice' => $Inv->id,
                'product' =>  $C[$i]->product,
                'status' => 0,
            ]); 
            $Pro = Product::find($C[$i]->product);
            $Pro->amount=$Pro->amount - $C[$i]->quantity;
            $Pro->save();
            Cart::destroy($C[$i]->id);
        }

        SendMail::dispatch($req->email)->delay(now()->addSecond(2));

        return redirect()->route('user.home');
    }
    public function order()
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();

        $dtProF = Account::find();
        //dd($dtProF);
        return view('user.pages.profile',compact('dtProF','dtProT','dtC'));
    }
    
}
