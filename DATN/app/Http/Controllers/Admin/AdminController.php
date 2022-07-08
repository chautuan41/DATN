<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\InvoiceDetail;
use App\Models\Invoice;

class AdminController extends Controller
{
    public function indexAdmin(){
        $dtInvD = DB::table('invoice_details')
        ->where('status','=', 1)
        ->get();
        //dd($dtInvD);
        $acc=DB::table('accounts')
        ->where('status','=', 1)
        ->where('role','=', 1)
        ->get();
        $acc=count($acc);
        $dtInv=DB::table('invoices')
        ->where('status','=', 1)
        ->get();
        //dd($dtInvD);
        return view('dashboard.home.home',compact('dtInvD','acc','dtInv'));
    }
    public function indexAdminDH(){
        return view('dashboard.layout.dashboard-watches');
    }
    public function indexAdminCL(){
        return view('dashboard.layout.dashboard-clothing');
    }
    public function indexAdminWH(){
        return view('dashboard.layout.dashboard-warehouse');
    }

    // public function home(){
    //     return view('dashboard.home');
    // }
}
