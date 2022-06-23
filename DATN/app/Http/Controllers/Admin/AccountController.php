<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // -- User -- //
    public function listUser(){
        $listUser = Account::all();
        return view('dashboard.user.list_user',compact('listUser'));
    }

    // -- Staff -- //
    public function listStaff(){
        $listStaff = Account::all();
        return view('dashboard.staff.list_staff',compact('listStaff'));
    }
    
}
