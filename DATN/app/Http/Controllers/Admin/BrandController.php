<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function listBrand(){
        $lsBrand = Brand::all();
        return view('dashboard.brand.brand',compact('lsBrand'));
    }
    public function formAddBrand(){
        return view('dashboard.brand.add_brand');
    }

    public function handleAddBrand(Request $request)
    {
        $checkBrand = Brand::where('brand_name',$request->brand_name)->first();
        if($checkBrand == true){
            return redirect()->back()->with("error","Brand already exists");
        }
        $br = new Brand();
        $br->brand_name = $request->brand_name;
        $br->status = 1;
        $br->save();
        return redirect()->back()->with("success","Add Brand successful");
    }
    public function deleteBrand($id_brand){
        $brand = Brand::find($id_brand);
        $brand->status = 0;
        $brand->save();
        $lsBrand = Brand::all();
        return redirect()->route('admin.listBrand');
    }
    public function formEditBrand($id_brand){
        $lsBrand = Brand::find($id_brand);
        return view('dashboard.brand.edit_brand',compact('id_brand','lsBrand'));
    }
    public function handleEditBrand(Request $request, $id_brand){
        $checkBrand = Brand::where('brand_name',$request->brand_name)->first();
        if($checkBrand == true){
            return redirect()->back()->with("error","Brand already exists");
        }
        $brand = Brand::find($id_brand);
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return redirect()->route('admin.listBrand');
    }
    public function searchBrand(){
        $search_text=$_GET['query'];
        $lsBrand = Brand::where('brand_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.brand.brand',compact('lsBrand'));
    }
}
