<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportInvoice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ImportInvoiceController extends Controller
{
    public function listIInvoices(){
        $lsIInvoice = ImportInvoice::all();
        return view('dashboard.iinvoices.iinvoices',compact('lsIInvoice'));
    }
    public function formAddIInvoices(){
        return view('dashboard.iinvoices.add_iinvoices');
    }

    public function handleAddIInvoices(Request $request)
    {
        $iinvoices = new ImportInvoice();
        $iinvoices->date = now('Asia/Ho_Chi_Minh');
        $iinvoices->total = $request->total;
        $iinvoices->account = $request->account;
        $iinvoices->supplier = $request->supplier;
        $iinvoices->status = 1;
        $iinvoices->save();
        return redirect()->back()->with("success","Add Input Invoices successful");
    }
    public function deleteIInvoices($id_input){
        $iinvoices = ImportInvoice::find($id_input);
        $iinvoices->status = 0;
        $iinvoices->save();
        return redirect()->route('admin.listIInvoices');
    }
    public function formEditIInvoices($id_input){
        $lsIInvoice = ImportInvoice::find($id_input);
        return view('dashboard.iinvoices.edit_iinvoices',compact('id_input','lsIInvoice'));
    }
    public function handleEditIInvoices(Request $request, $id_input){
        // $checkCategories = ImportInvoice::where('categories_name',$request->categories_name)->first();
        // if($checkCategories == true){
        //     return redirect()->back()->with("error","ImportInvoice already exists");
        // }
        
        
        $iinvoices = ImportInvoice::find($id_input);
        $iinvoices->iinvoices_id = 'ok';
        $iinvoices->date = now('Asia/Ho_Chi_Minh');
        $iinvoices->total = $request->total;
        $iinvoices->account = $request->account;
        $iinvoices->supplier = $request->supplier;
        $iinvoices->save();
        return redirect()->route('admin.listIInvoices');
    }
    public function searchIInvoices(){
        $search_text=$_GET['query'];
        $lsIInvoice = ImportInvoice::where('date','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.iinvoices.iinvoices',compact('lsIInvoice'));
    }
}
