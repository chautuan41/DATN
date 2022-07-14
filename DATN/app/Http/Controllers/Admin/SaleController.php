<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SaleController extends Controller
{
    //
    public function index(){
        $check=Auth::user()->role;
        if($check==6){
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
            return view('dashboard.sale.index',compact('dtInvD','acc','dtInv','dtIInv','order','tracking'));
        }
        return redirect()->back();
    }

    public function order(){
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
        return view('dashboard.sale.order',compact('dtInv','order','tracking'));
    }

   function orderDetails($id)
   {
    $dtInvD = DB::table('products')
    ->join('invoice_details', 'invoice_details.product', '=', 'products.id')
    ->where('invoice_details.invoice','=', $id)
    ->where('invoice_details.status','=', 0)
    ->get();
    //dd($dtInvD);
    return response()->json(['data'=>$dtInvD],200);
       
        //return view('dashboard.product.create',compact('dtC','dtB','dtS','dtProT'));
   }

   public function orderTracking(){
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
    return view('dashboard.sale.ordertracking',compact('dtInv','order','tracking'));
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