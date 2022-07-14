<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportInvoice;
use App\Models\ImportInvoiceDetail;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Categories;
use App\Models\ProductType;
use App\Models\Brand;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ImportInvoiceController extends Controller
{
    public function listIInvoices(){
        $lsIInvoice = ImportInvoice::all();
        $Sup = Supplier::all();
        $Acc=Account::all();
        return view('dashboard.iinvoices.iinvoices',compact('lsIInvoice','Sup','Acc'));
    }

    public function listWaitIInvoices(){
        $lsIInvoice = ImportInvoice::all();
        $Sup = Supplier::all();
        $Acc=Account::all();
        return view('dashboard.iinvoices.waitii',compact('lsIInvoice','Sup','Acc'));
    }

    public function listIIStaff(){
        $lsIInvoice = ImportInvoice::all();
        $Sup = Supplier::all();
        $Acc=Account::all();
        return view('dashboard.iinvoices.iistaff',compact('lsIInvoice','Sup','Acc'));
    }

    public function formAddIInvoices(){
        $Pro = Product::all();
        $Sup = Supplier::all();
        return view('dashboard.iinvoices.hdn',compact('Pro','Sup'));
    }

    public function handleAddIInvoices(Request $request)
    {

        $TK = new ImportInvoice();
        $TK->date = now('Asia/Ho_Chi_Minh');
        $TK->total = 0;
        $TK->account = Auth::user()->id;
        $TK->supplier = $request->supplier;
        $TK->status = 0;
        $TK->save();
        $idne = $TK -> id;
        return response()->json([
            'idcthd'=>$idne,
            'data'=>$TK,
            'message'=>'Tạo sinh viên thành công'
        ],200); // 200 là mã lỗi

       
        
        return redirect()->back()->with("success","Add Input Invoices successful");
    }

    function xulycreatectsp(Request $request){
        
        $TK = new ImportInvoiceDetail();
        $TK->amount = $request->amount;
        $TK->price = $request->price;
        $TK->import_invoice = $request->import_invoice;
        $TK->product = $request->product;
        $TK->status = 1;
        $TK->save();

        $Pro = Product::find($request->product);
        $Pro->price = $request->price * 1.3;
        $Pro->amount = $request->amount;
        $Pro->save();

        $II = ImportInvoice::find($request->import_invoice);
        $II->total = $request->price * $request->amount;
        $II->save();

        return response()->json([
            'data'=>$TK,
        ],200); // 200 là mã lỗi

    }

    public function deleteIInvoices($id_input){
        $iinvoices = ImportInvoice::find($id_input);
        $iinvoices->status = 0;
        $iinvoices->save();
        return redirect()->route('admin.listWaitIInvoices');
    }

    public function confirmInvoices($id_input){
        $iinvoices = ImportInvoice::find($id_input);
        $iinvoices->status = 1;
        $iinvoices->save();
        $lsIInvoice = ImportInvoice::all();
        return redirect()->route('admin.listWaitIInvoices');
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


    public function addProduct()
   {
        $dtB = Brand::all();
        $dtS = Supplier::all();
        $dtC = Categories::all();
        $dtProT = ProductType::all();
        return view('dashboard.iinvoices.add_product',compact('dtC','dtB','dtS','dtProT'));
   }

   public function handleaddProduct(Request $req)
   {
       $Pro = new Product();
       $Pro->sku = $req->sku;
       $Pro->product_name = $req->product_name;
       $Pro->description = $req->description;
       $Pro->gender = $req->gender;
       $Pro->price = $req->price;
       $Pro->amount = $req->amount;
       $Pro->discount = $req->discount;
       $Pro->like = $req->like;
       $Pro->categories = $req->categories;
       $Pro->product_type = $req->product_type;
       $Pro->supplier = $req->supplier;
       $Pro->brand = $req->brand;

        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $req->sku.'.'.$extension;
            $file_name= 'images/shop/product/'.$filename;
            $file->move('images/shop/product/',$filename);
            $Pro->image = $file_name;
        }
        $Pro -> save();


        if($req->has("images")){
            $i=1;
            foreach($req->file('images') as $image){
                $imageName = $req->sku.'-'.$i++.'.'.$file->getClientOriginalExtension();
                $imageName= 'images/shop/product/picture/'.$imageName;
                $image->move('images/shop/product/picture/',$imageName);
                Picture::create([
                    'product'=>$Pro->id,
                    'image'=>$imageName
                ]);

            }
        }
      
       $dtPro = Product::all();
      return redirect()->route('admin.formAddIInvoices',compact('dtPro'));
   }
}
