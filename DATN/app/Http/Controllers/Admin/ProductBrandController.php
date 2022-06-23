<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProductBrandController extends Controller
{
    public function pdClothing(){
        $pdClothing = ProductBrand::all();
        return view('dashboard.product_brand.pb_clothing',compact('pdClothing'));
    }

    public function pdWatches(){
        $pdWatches = ProductBrand::all();
        return view('dashboard.product_brand.pb_watches',compact('pdWatches'));
    }
}
