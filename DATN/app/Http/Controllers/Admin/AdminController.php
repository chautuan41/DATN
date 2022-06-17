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

class AdminController extends Controller
{
    public function indexAdmin(){
        return view('dashboard.layout.dashboard-admin');
    }
    public function indexAdminDH(){
        return view('dashboard.layout.dashboard-watches');
    }
    public function indexAdminCL(){
        return view('dashboard.layout.dashboard-clothing');
    }
}
