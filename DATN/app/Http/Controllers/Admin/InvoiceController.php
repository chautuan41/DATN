<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\InvoiceDetail;

class InvoiceController extends Controller
{
    // public function listOInvoices(){
    //     $lsOInvoice = Invoice::all();
    //     return view('dashboard.oinvoices.oinvoices',compact('lsOInvoice'));
    // }

    public function listOInvoices(){
        $lsOInvoice = Invoice::all();
        $lsAcc = Account::all();
        return view('dashboard.oinvoices.oinvoices',compact('lsOInvoice','lsAcc'));
    }
   
    public function searchOInvoices(){
        $search_text=$_GET['query'];

        $lsOInvoice = Invoice::where('date_time','LIKE','%'.$search_text.'%')->where('status','=',2)->get();
        $lsAcc = Account::all();
        return view('dashboard.oinvoices.oinvoices',compact('lsOInvoice','lsAcc'));

    }

    
}
