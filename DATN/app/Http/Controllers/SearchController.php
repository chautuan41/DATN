<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\ProductType;
use App\Models\Cart;

class SearchController extends Controller
{
    //
   
    

    public function getSearchAjax(Request $request)
    {
        
         $dtC = Categories::all();
         $dtProT = ProductType::all();
         $cart = Count(Cart::all());
        return view('user.searchajax',compact('dtProT','dtC','cart'));
    }
    function postSearchAjax(Request $request)
    {
        
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
            ->where('product_name', 'LIKE', "%{$query}%")
            ->skip(0)->take(6)
            ->get();
            $output = '<div class="dropdown-menu">
            <div class="row">

                <!-- Basic -->
                <div class="col-md-12">
                    <ul>';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="shop/products/'. $row->id .'">'.$row->product_name.'</a>
                            
               </li>
               ';
           }
           $output .= ' </ul>
           </div>

          

            </div><!-- / .row -->
            </div>';
           echo $output;
       }
       else{
        $dtSP=DB::table('products')
        ->join('product_types','product_types.id','products.product_type')
        ->where('product_name', 'LIKE', "%{$request->country_name}%")
        ->orwhere('product_type_name', 'LIKE', "%{$request->country_name}%")
        ->get();
        
         $dtC = Categories::all();
         $dtProT = ProductType::all();
         $cart = Count(Cart::all());
         //dd($dtSP);
         
         return view('user.pages.search',compact('dtSP','dtProT','dtC','cart'));
       }

    }
}