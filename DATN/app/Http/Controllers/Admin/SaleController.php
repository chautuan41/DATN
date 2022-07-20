<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportInvoice;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SaleController extends Controller
{
    //
    public function index(){
        $check=Auth::user()->role;
        if($check==4){
            $date1=now()->toDateString();

            $dtInvD = DB::table('invoice_details')
            ->where('status','=', 2)
            ->where('created_at','LIKE', "%{$date1}%")
            ->get();
            
            $acc=DB::table('accounts')
            ->where('status','=', 1)
            ->where('role','=', 1)
            ->where('created_at','LIKE', "%{$date1}%")
            ->get();
            $acc=count($acc);
    
            $dtInv=DB::table('invoices')
            ->where('status','=', 2)
            ->where('created_at','LIKE', "%{$date1}%")
            ->get();
    
            $dtIInv=DB::table('import_invoices')
            ->where('status','=', 1)
            ->where('created_at','LIKE', "%{$date1}%")
            ->get();
           
            $order = DB::table('invoices')
            ->join('accounts','invoices.account','=','accounts.id')
            ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
            ->where('invoices.status','=', 0)
            ->get();
            $order=count($order);
            $tracking = DB::table('invoices')
            ->join('accounts','invoices.account','=','accounts.id')
            ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
            ->where('invoices.status','=', 1)
            ->get();
            $tracking=count($tracking);

           
            $stats = Invoice::select(DB::raw("hour(date_time) as year"),DB::raw("SUM(total) as count"))
            ->where('date_time','LIKE', "%{$date1}%")
            ->where('status',2)
            ->orderBy('date_time')
            ->groupBy(DB::raw("hour(date_time)"))
            ->get();

            $stats1 = ImportInvoice::select(DB::raw("day(date) as year"),DB::raw("SUM(total) as count"))
            ->where('date','LIKE', "%{$date1}%")
            ->where('status',1)
            ->orderBy('date')
            ->groupBy(DB::raw("day(date)"))
            ->get();
            //$stats=array_column($stats, 'count');
            //dd($stats1);
            $check=1;
            return view('dashboard.sale.index',compact('dtInvD','acc','dtInv','dtIInv','order','tracking','stats','stats1','check'));
        }
        return redirect()->back();
    }

    public function order(){
        $check=0;
        $dtInv = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 0)
        ->get();
        $order=count($dtInv);

        $tracking = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 1)
        ->get();
        $tracking=count($tracking);
        //dd($dtInv);
        return view('dashboard.sale.order',compact('dtInv','order','tracking','check'));
    }

   function orderDetails($id)
   {
    $check=0;
        $dtInv = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 0)
        ->get();
        $order=count($dtInv);

        $tracking = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 1)
        ->get();
        $tracking=count($tracking);

    $dtInvD = DB::table('invoice_details')
    ->join('products', 'invoice_details.product', '=', 'products.id')
    ->join('sizes', 'invoice_details.size', '=', 'sizes.id')
    ->where('invoice_details.invoice','=', $id)
    ->where('invoice_details.status','=', 0)
    ->select('invoice_details.*','products.product_name','sizes.size')
    ->get();
    //dd($dtInvD);
    // return response()->json(['data'=>$dtInvD],200);
       
    return view('dashboard.sale.orderdetails',compact('dtInvD','order','tracking','check'));
   }

   public function showeditorderDetails($id)
   {
        $check=0;
        $dtInv = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 0)
        ->get();
        $order=count($dtInv);

        $tracking = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 1)
        ->get();
        $tracking=count($tracking);

    $dtInvD = InvoiceDetail::find($id);

    $size=DB::table('sizes')
    ->where('product','=', $dtInvD->product)
    ->get();
    $pro=Product::all();
    //dd($dtInvD);
    // return response()->json(['data'=>$dtInvD],200);
       
    return view('dashboard.sale.editorder',compact('dtInvD','order','tracking','check','size','pro'));
   }

   public function editorderDetails(request $req, $id)
   {
       

    $dtInvD = InvoiceDetail::find($id);
    $dtInvD->size=$req->size;

    $size=Size::find($req->size);
    $size->amount=$size->amount + $dtInvD->amount - $req->amount;
    $size->save();

    $dtInvD->amount=$req->amount;

    $pro=Product::find($dtInvD->product);

    $dtInvD->total=$req->amount*$pro->price;
    $dtInvD->status=0;
    $dtInvD->save();

    
    
    //dd($dtInvD);
    // return response()->json(['data'=>$dtInvD],200);
       
    return redirect()->route('sale.orderdetail', ['id' => $dtInvD->invoice]);
   }

   public function orderTracking(){
    $check=0;
    $dtInv = DB::table('invoices')
    ->join('accounts','invoices.account','=','accounts.id')
    ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
    ->where('invoices.status','=', 1)
    ->get();
    $tracking=count($dtInv);
    
    $order = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 0)
        ->get();
    $order=count($order);
    //dd($dtInv);
    return view('dashboard.sale.ordertracking',compact('dtInv','order','tracking','check'));
    }

    function orderTrackingDetails($id)
    {
    $dtInvD = DB::table('products')
    ->join('invoice_details', 'invoice_details.product', '=', 'products.id')
    ->where('invoice_details.invoice','=', $id)
    ->where('invoice_details.status','=', 1)
    ->get();
    //dd($dtInvD);
    return response()->json(['data'=>$dtInvD],200);
    
        //return view('dashboard.product.create',compact('dtC','dtB','dtS','dtProT'));
    }

   function processed($id){
       
    $dtInv = Invoice::find($id);
    $dtInv->status=1;
    $dtInv->save();

    $dtInvD = DB::table('invoices')
    ->join('invoice_details', 'invoice_details.invoice', '=', 'invoices.id')
    ->where('invoice_details.invoice','=', $id)
    ->where('invoice_details.status','=', 0)
    ->get();
    for($i=0;$i<count($dtInvD);$i++){
        $InvD = InvoiceDetail::find($dtInvD[$i]->id);
        $InvD->status = 1;
        $InvD->save();
    }
    
      return redirect()->route('sale.order');
   }

   function confirm($id){
       
    $dtInv = Invoice::find($id);
    $dtInv->status=2;
    $dtInv->save();

    $dtInvD = DB::table('invoices')
    ->join('invoice_details', 'invoice_details.invoice', '=', 'invoices.id')
    ->where('invoice_details.invoice','=', $id)
    ->where('invoice_details.status','=', 1)
    ->get();
    for($i=0;$i<count($dtInvD);$i++){
        $InvD = InvoiceDetail::find($dtInvD[$i]->id);
        $InvD->status = 2;
        $InvD->save();
    }
    
      return redirect()->route('sale.ordertracking');
   }
}