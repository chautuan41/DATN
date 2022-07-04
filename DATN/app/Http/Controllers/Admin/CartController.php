<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

   function showCreate()
   {
        
       
        //return view('dashboard.product.create',compact('dtC','dtB','dtS','dtProT'));
   }

   function create(Request $req){
       
      //return redirect()->route('products',compact('dtPro'));
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
