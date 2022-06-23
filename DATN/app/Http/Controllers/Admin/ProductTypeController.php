<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    public function ptTop(){
        $ptTop = ProductType::all();
        return view('dashboard.product_brand.ptct_top',compact('ptTop'));
    }

    public function ptBottom(){
        $ptBottom = ProductType::all();
        return view('dashboard.product_brand.ptct_bottom',compact('ptBottom'));
    }

    public function ptWatches(){
        $ptWatches = ProductType::all();
        return view('dashboard.product_brand.pt_watches',compact('ptWatches'));
    }
}
