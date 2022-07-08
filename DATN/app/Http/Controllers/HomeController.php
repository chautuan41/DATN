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
        $dtSP = DB::table('invoice_details')
        ->join('products', 'invoice_details.product', '=', 'products.id')
        ->where('invoice_details.status',1)
        ->orderBy('invoice_details.amount', 'desc')
        ->skip(0)->take(6)->get();
        //dd($dtSP);
        $dtPro = DB::table('products')->orderBy('created_at', 'desc')->skip(0)->take(6)->get();
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
    
    public function Profile($id)
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtProF = Account::find($id);
        $cart = Count(Cart::all());
        //dd($dtProF);
        return view('user.pages.profile',compact('dtProF','dtProT','dtC','cart'));
    }

    public function showeditProfile($id)
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtProF = Account::find($id);
        $cart = Count(Cart::all());
        //dd($dtProF);
        return view('user.pages.editprofile',compact('dtProF','dtProT','dtC','cart'));
    }

    public function editProfile(Request $req, $id)
    {
        $Acc=Account::find($id);
        $Acc->full_name = $req->name;
        $Acc->address = $req->adddress;
        $Acc->phone = $req->phone;
        $Acc->date_of_birth = $req->birth;
        $Acc->save();
        return redirect()->route('user.profile',$id);
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
      
        return redirect()->route('user.cart');
    }

    public function showCart()
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $cart = Count(Cart::all());
        $dtCart = DB::table('products')
        ->join('carts','carts.product','=','products.id')
        ->where('account','=', Auth::user()->id)
        ->get();
        //dd($dtCart);
        return view('user.pages.checkout',compact('dtProT','dtC','dtCart','cart'));
    }

    public function deleteCart($id)
    {
        $delete = Cart::find($id);
        $delete->delete();
        
        return redirect()->route('user.cart');
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
        $dtProT = ProductType::all();
        $dtC = Categories::all();
        $cart = Count(Cart::all());
        $dtInv = Invoice::where('account',Auth::user()->id)->get();
        $dtInvD = InvoiceDetail::all();
        //dd($dtInv);
        return view('user.pages.order',compact('dtProT','dtC','cart','dtInv','dtInvD'));
    }

    public function OrderDetailsId($id)
    {
        
        $dtInvD = DB::table('products')
        ->join('invoice_details', 'invoice_details.product', '=', 'products.id')
        ->where('invoice_details.invoice','=', $id)
        ->get();
        //dd($dtInvD);
        return response()->json(['data'=>$dtInvD],200);                      
    }

    public function OrderDetails()
    {
        $dtProT = ProductType::all();
        $dtC = Categories::all();
        $cart = Count(Cart::all());
        $dtInvD = DB::table('products')
        ->join('invoice_details', 'invoice_details.product', '=', 'products.id')
        ->get();
        //dd($dtInvD);
        return view('user.pages.orderdetails',compact('dtProT','dtC','cart','dtInvD'));
    }

    function upload(Request $request)
    {
       
       if($request->hasFile('files')){
            $file = $request->file('files');
            $name = $file->getClientOriginalName();
            $exection = $file->getClientOriginalExtension();
            $file_name= 'user/images/profile/'.$name;
            
            $file->move(public_path('user/images/profile'), $name);
            $acc = Account::find($request->id);
            $acc->avatar = $file_name;
            $acc->save();
            //echo public_path().'/uploads/';
            
        }
        return redirect()->route('user.profile',Auth::user()->id);
        
        

    }

    
    
}
