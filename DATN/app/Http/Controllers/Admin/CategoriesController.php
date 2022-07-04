<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class CategoriesController extends Controller
{
    public function listCategories(){
        $lsCategories = Categories::all();
        return view('dashboard.categories.categories',compact('lsCategories'));
    }
    public function formAddCategories(){
        return view('dashboard.categories.add_categories');
    }

    public function handleAddCategories(Request $request)
    {
        $checkCategories = Categories::where('categories_name',$request->categories_name)->first();
        if($checkCategories == true){
            return redirect()->back()->with("error","Categories already exists");
        }
        $categories = new Categories();
        $categories->categories_name = $request->categories_name;
        $categories->status = 1;
        $categories->save();
        return redirect()->back()->with("success","Add Categories successful");
    }
    public function deleteCategories($id_cgr){
        $categories = Categories::find($id_cgr);
        $categories->status = 0;
        $categories->save();
        $lsCategories = Categories::all();
        return redirect()->route('admin.listCategories');
    }
    public function formEditCategories($id_cgr){
        $lsCategories = Categories::find($id_cgr);
        return view('dashboard.categories.edit_categories',compact('id_cgr','lsCategories'));
    }
    public function handleEditCategories(Request $request, $id_cgr){
        // $checkCategories = Categories::where('categories_name',$request->categories_name)->first();
        // if($checkCategories == true){
        //     return redirect()->back()->with("error","Categories already exists");
        // }
        $categories = Categories::find($id_cgr);
        $categories->categories_name = $request->categories_name;
        $categories->save();
        return redirect()->route('admin.listCategories');
    }
    public function searchCategories(){
        $search_text=$_GET['query'];
        $lsCategories = Categories::where('categories_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.categories.categories',compact('lsCategories'));
    }
}
