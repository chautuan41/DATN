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
use App\Models\Favourite;
use App\Models\Size;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        ->select('products.*')
        ->join('products', 'invoice_details.product', '=', 'products.id')
        ->where('invoice_details.status',2)
        ->skip(0)->take(6)->distinct()->get();
         //dd($dtSP);
        $dtPro = DB::table('products')
        ->orderBy('created_at', 'desc')
        ->skip(0)->take(6)->get();
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
        ->where('product','=', $id)
        ->get();
        $dtProP = DB::table('pictures')
        ->where('product','=', $id)->get();
        $dtCm=DB::table('comments')
        ->join('accounts', 'comments.account', '=', 'accounts.id')
        ->select('comments.status','comments.date_time','comments.comment','accounts.full_name','accounts.avatar')
        ->where('product','=', $id)
        ->get();
        $dtProR=DB::table('products')
        ->where('product_type','=', $dtPro->product_type)
        ->distinct()
        ->skip(0)->take(4)->inRandomOrder()->get();
        //dd($dtProR);
        return view('user.pages.productdetail',compact('dtProTid','dtProT','dtProD','dtPro','dtC','cart','dtCm','dtProP','dtProR'));
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
        //dd($id);
        
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
        return redirect()->route('user.profile',$id)->with("success1","Successfully changed information");
    }

    public function showChange($id)
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtProF = Account::find($id);
        $cart = Count(Cart::all());
        return view('user.pages.changepassword',compact('dtProF','dtProT','dtC','cart'));
        
    }

    public function changePassword(Request $req, $id)
    {
        
        $Acc=Account::find($id);
        if(!(Hash::check($req->password, $Acc->password))){
            return redirect()->back()->with("error1","Incorrect password");
        }
        if($req->newpassword!=$req->confirmation){
            return redirect()->back()->with("error2","Confirmation password is incorrect");
        }
        $req->validate([
            'password' => 'required',
            'newpassword' => 'required|string|min:7',
            'confirmation' => 'required|same:newpassword',
        ]);
        
        $Acc->password = bcrypt($req->confirmation);
        $Acc->save();
        
        return redirect()->route('user.profile',$id)->with("success2","Password successfully changed");
    }
    
    public function addCart(Request $req, $id)
    {
        $check = DB::table('carts')
        ->where('account','=', Auth::user()->id)
        ->where('product','=',$id)
        ->where('size','=',$req->size)
        ->get();
       
        $pro=Product::find($id);
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
        
        $dtCart = DB::table('products')
        ->join('carts','carts.product','=','products.id')
        ->where('account','=', Auth::user()->id)
        ->select('products.*','carts.id as icart', 'carts.total','carts.quantity','carts.size')
        ->get();
        $dtsize = Size::all();
        $cart = Count($dtCart);
        //dd($dtCart);
        return view('user.pages.checkout',compact('dtProT','dtC','dtCart','cart','dtsize'));
    }
    public function deleteCart($id)
    {
        $delete = Cart::find($id);
        $delete->delete();
        
        return redirect()->route('user.cart');
    }

    public function favourite()
    {
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        $dtCart = DB::table('products')
        ->join('carts','carts.product','=','products.id')
        ->where('account','=', Auth::user()->id)
        ->select('products.*','carts.id as icart', 'carts.total','carts.quantity','carts.size')
        ->get();
        
        $dtF = DB::table('products')
        ->join('favourites','favourites.product','products.id')
        ->where('account','=', Auth::user()->id)
        ->select('products.*','favourites.id as ifa')
        ->distinct()
        ->get();
        $cart = Count($dtCart);
        //dd($dtF);
        return view('user.pages.cart',compact('dtProT','dtC','dtCart','cart','dtF'));
    }

    public function addFavourite($id)
    {
        $check =DB::table('products')
        ->join('favourites','favourites.product','products.id')
        ->where('account','=', Auth::user()->id)
        ->where('product','=', $id)
        ->get();
        //dd($check);
        if(count($check)==0){
            $f = new Favourite();
            $f->account=Auth::user()->id;
            $f->product=$id;
            $f -> save();
        }
       
        
        return redirect()->route('user.favourite');
    }

    public function deleteFavourite($id)
    {
        $delete = Favourite::find($id);
        $delete->delete();
        return redirect()->route('user.favourite');
    }

    public function checkout(Request $req)
    {
       
       //dd($req->all());
       
       
       $Inv= Invoice::create([
            'date_time' => now(),
            'shipping_name' => $req->name,
            'shipping_phone' => $req->phone,
            'shipping_address' => $req->address,
            'total' => $req->total,
            'account' => $req->account,
            'status' => 0,
        ]);
        $C = Cart::all();
        for($i=0;$i<count($C);$i++){
            InvoiceDetail::create([
                'amount' => $C[$i]->quantity,
                'size' => $C[$i]->size,
                'total' => $C[$i]->total,
                'invoice' => $Inv->id,
                'product' =>  $C[$i]->product,
                'status' => 0,
            ]); 
            $size = Size::find($C[$i]->size);
            $size->amount=$size->amount - $C[$i]->quantity;
            $size->save();
            Cart::destroy($C[$i]->id);
        }

        SendMail::dispatch($req->email)->delay(now()->addSecond(2));

        return redirect()->route('user.order')->with("success","Change photo successfully");
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
        
        $dtInvD = DB::table('invoice_details')
        ->join('sizes', 'invoice_details.size', 'sizes.id')
        ->join('products', 'invoice_details.product','products.id')
        ->where('invoice_details.invoice','=', $id)
        ->select('invoice_details.*','products.*','sizes.size')
        ->get();
        
        return response()->json(['data'=>$dtInvD],200);                      
    }

    function upload(Request $request)
    {
       if($request->hasFile('files')){
            $file = $request->file('files');
            $name = $file->getClientOriginalName();
            $file_name= 'images/profile/'.$name;
            $file->move(public_path('images/profile'), $name);
            $acc = Account::find($request->id);
            $acc->avatar = $file_name;
            $acc->save();
            //echo public_path().'/uploads/';
            return redirect()->route('user.profile',Auth::user()->id)->with("success","Change photo successfully");
        }
        return redirect()->route('user.profile',Auth::user()->id)->with("error","Photo change failed");
    }

    public function like($id)
    {
        $like = Product::find($id);
        $like->like += 1;
        $like->save();
    }
    
}
