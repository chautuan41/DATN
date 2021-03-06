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
use App\Models\Picture;
use App\Models\Size;
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
        $Pro = DB::table('products')
        ->orderBy('product_name', 'asc')
        ->get();
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
        $TK->sku = $request->product_id;
        $TK->amount = $request->amount;
        $TK->price = $request->price;
        $TK->import_invoice = $request->import_invoice;
        $TK->product = $request->product;
        $TK->size = $request->size;
        $TK->status = 0;
        $TK->save();

        $Pro = Product::find($request->product);
        $Pro->sku = $request->product_id;
        $Pro->price = $request->price * 1.3;
        $Pro->save();

        $size=Size::find($request->size);
        $size->amount+= $request->amount;
        $size->status= 0;
        $size->save();

        $II = ImportInvoice::find($request->import_invoice);
        $II->total += $request->price * $request->amount;
        
        $II->save();

        return redirect()->back()->with("success","Add Input Invoices successful");

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
        $iinvoicesD = DB::table('import_invoice_details')
        ->where('import_invoice',$id_input)
        ->get();
        $n=count($iinvoicesD);
        for($i=0;$i<$n;$i++){
            $iiD = ImportInvoiceDetail::find($iinvoicesD[$i]->id);
            $iiD->status=1;
            $iiD->save();
            $size=Size::find($iiD->size);
            $size->status=1;
            $size->save();
        }
        
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

   public function addSize(Request $req){
        $Size = new Size();
        $Size->size = $req->size;
        $Size->amount = $req->amount;
        $Size->product = $req->product;
        $Size->status = 1;
        $Size -> save();
   }

   public function handleaddProduct(Request $req)
   {
       $Pro = new Product();
       
       $Pro->product_name = $req->product_name;
       $Pro->description = $req->description;
       $Pro->gender = $req->gender;
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

   public function size($id){
        $size=Size::where('product','=',$id)->get();
       
        return response()->json($size);
   }
   public function sku($id){
   
    $sku=Product::find($id);
    return response()->json($sku);
}

public function pro($id){
   
    $pro=DB::table('products')
    ->where('supplier',$id)
    ->get();
    return response()->json($pro);
}
   

   public function productWH(){
    
    $wh=DB::table('sizes')
    ->join('products', 'sizes.product', 'products.id')
    ->where('sizes.status',1)
    ->get();
    return view('dashboard.iinvoices.prowh',compact('wh'));
}

function hdDetails($id)
   {
    
    $lsIInvoice = DB::table('import_invoice_details')
    ->join('products', 'import_invoice_details.product', 'products.id')
    ->join('sizes', 'sizes.id', 'import_invoice_details.size')
    ->where('import_invoice_details.import_invoice', $id)
    ->where('import_invoice_details.status', 1)
    ->select('import_invoice_details.*','products.sku','sizes.size')
    ->get();
    //dd($lsIInvoice);
    return response()->json(['data'=>$lsIInvoice],200);
       
        //return view('dashboard.product.create',compact('dtC','dtB','dtS','dtProT'));
   }
   function hdDetails1($id)
   {
    
    $lsIInvoice = DB::table('import_invoice_details')
    ->join('products', 'import_invoice_details.product', 'products.id')
    ->join('sizes', 'sizes.id', 'import_invoice_details.size')
    ->where('import_invoice_details.import_invoice', $id)
    ->where('import_invoice_details.status', 0)
    ->select('import_invoice_details.*','products.sku','sizes.size')
    ->get();
    //dd($lsIInvoice);
    return response()->json(['data'=>$lsIInvoice],200);
       
        //return view('dashboard.product.create',compact('dtC','dtB','dtS','dtProT'));
   }
}
