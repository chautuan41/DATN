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
    public function listSupplier(){
        $lsSupplier = Supplier::all();
        return view('dashboard.supplier.supplier',compact('lsSupplier'));
    }
    
    public function formAddSupplier(){
        return view('dashboard.supplier.add_supplier');
    }

    public function handleAddSupplier(Request $request)
    {
        $idSL = Supplier::where('supplier_id',$request->supplier_id)->first();
        if($idSL == true){
            return redirect()->back()->with("error","Supplier already exists");
        }
        $sl = new Supplier();
        $sl->supplier_id = $request->supplier_id;
        $sl->supplier_name = $request->supplier_name;
        $sl->phone = $request->phone;
        $sl->address = $request->address;
        $sl->status = 1;
        $sl->save();
        return redirect()->back()->with("success","Add Supplier successful");
    }

    public function deleteSupplier($id_supplier){
        $supplier = Supplier::find($id_supplier);
        $supplier->status = 0;
        $supplier->save();
        $lsSupplier = Supplier::all();
        return redirect()->route('admin.listSupplier');
    }
    public function formEditSupplier($id_supplier){
        $lsSupplier = Supplier::find($id_supplier);
        return view('dashboard.supplier.edit_supplier',compact('id_supplier','lsSupplier'));
    }

    public function handleEditSupplier(Request $request, $id_supplier){
        // $checkSupplier = Supplier::where('supplier_id',$request->supplier_id)->first();
        // if($checkSupplier == true){
        //     return redirect()->back()->with("error","Supplier already exists");
        // }
        $sl = Supplier::find($id_supplier);
        $sl->supplier_id = $request->supplier_id;
        $sl->supplier_name = $request->supplier_name;
        $sl->phone = $request->phone;
        $sl->address = $request->address;
        $sl->save();
        return redirect()->route('admin.listSupplier');
    }
    public function searchSupplier(){
        $search_text=$_GET['query'];
        $lsSupplier = Supplier::where('supplier_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.supplier.supplier',compact('lsSupplier'));
    }
}
