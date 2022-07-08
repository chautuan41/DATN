<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $dtInv = DB::table('invoices')
        ->join('accounts','invoices.account','=','accounts.id')
        ->select('invoices.id','invoices.date_time','invoices.shipping_address','invoices.total','full_name','phone','email')
        ->where('invoices.status','=', 0)
        ->get();
        return view('dashboard.cart.index',compact('dtInv'));
    }

   function invoicedetails($id)
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
    
      return redirect()->route('admin.cart');
   }


   function showEdit($id)
   {
       
        
       //return view('dashboard.product.edit',compact('dt','dtProT','dtB','dtS','dtC'));
   }

   function edit(Request $req, $id){       
      

      //return redirect()->route('products',compact('dtPro'));
   }

   function delete($id){       
       
       //return redirect()->route('products',compact('dtPro'));
   } 
}
