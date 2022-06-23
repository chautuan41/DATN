<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function supplierClothing(){
        $supplierClothing = Supplier::all();
        return view('dashboard.supplier.supplier_clothing',compact('supplierClothing'));
    }

    public function supplierWatches(){
        $supplierWatches = Supplier::all();
        return view('dashboard.supplier.supplier_watches',compact('supplierWatches'));
    }
}
