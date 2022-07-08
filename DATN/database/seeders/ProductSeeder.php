<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Carbon\Carbon;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = array(
            array(
                
                'sku'=>'TO',
                'product_name'=>'The Overcoat',
                'price'=>2550,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'TO1_C.jpg',
                'categories' => 1,
                'product_type' => 4,
                'supplier' => 10,
                'brand'=> 10,
                'gender' => 1,
                'status'=>1,
            ),
            array(
                
                'sku'=>'ME',
                'product_name'=>'MEDUSA SLIM-FIT JEANS',
                'price'=>816,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'ME1_D.jpg',
                'categories' => 1,
                'product_type' => 5,
                'supplier' => 5,
                'brand'=> 5,
                'gender' => 1,
                'status'=>1,
            ),
            array(
                
                'sku'=>'SLR',
                'product_name'=>'SAINT LAURENT REVERSE T-SHIRT',
                'price'=>100,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'SLR1_T.jpg',
                'categories' => 1,
                'product_type' => 1,
                'supplier' => 6,
                'brand'=> 6,
                'gender' => 1,
                'status'=>1,
            ),
            array(
                
                'sku'=>'DJK',
                'product_name'=>'DIOR AND JACK KEROUAC SHORT-SLEEVED SHIRT',
                'price'=>1300,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'DJK1_S.jpg',
                'categories' => 1,
                'product_type' => 2,
                'supplier' => 2,
                'brand'=> 2,
                'gender' => 1,
                'status'=>1,
            ),

            array(
                
                'sku'=>'OZT',
                'product_name'=>'OZTRADAMUS PANTS',
                'price'=>65,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'OZT1_P.jpg',
                'categories' => 1,
                'product_type' => 3,
                'supplier' => 8,
                'brand'=> 8,
                'gender' => 1,
                'status'=>1,
            ),
            array(
                
                'sku'=>'CFM',
                'product_name'=>'CLASSIC FIT MESH POLO SHIRT',
                'price'=>110,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'CFM1_P.jpg',
                'categories' => 1,
                'product_type' => 1,
                'supplier' => 7,
                'brand'=> 7,
                'gender' => 0,
                'status'=>1,
            ),
            
            array(
                
                'sku'=>'CT',
                'product_name'=>'CLASSICS TOWELING WOMEN SHORTS',
                'price'=>45,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'CT1_SH.jpg',
                'categories' => 1,
                'product_type' => 3,
                'supplier' => 9,
                'brand'=> 9,
                'gender' => 0,
                'status'=>1,
            ),
            array(
                
                'sku'=>'SGCT',
                'product_name'=>'SQUARE G CHECK TWEED JACKET',
                'price'=>3400,
                'amount'=>100,
                'discount'=>0,
                'like'=>0,
                'image'=>'SGCT1_J.jpg',
                'categories' => 1,
                'product_type' => 4,
                'supplier' => 1,
                'brand'=> 1,
                'gender' => 0,
                'status'=>1,
            ),

            
            array(
                
                'sku'=>'LDJ',
                'product_name'=>'LADY-DATEJUST',
                'price'=>87000,
                'amount'=>5,
                'discount'=>0,
                'like'=>0,
                'image'=>'LDJ1_CR.jpg',
                'categories' => 2,
                'product_type' => 6,
                'supplier' => 4,
                'brand'=> 4,
                'gender' => 0,
                'status'=>1,
            ),

            array(
                
                'sku'=>'SD',
                'product_name'=>'SEA-DWELLER',
                'price'=>18118,
                'amount'=>5,
                'discount'=>0,
                'like'=>0,
                'image'=>'SD1_PR.jpg',
                'categories' => 2,
                'product_type' => 7,
                'supplier' => 4,
                'brand'=> 4,
                'gender' => 1,
                'status'=>1,
            ),

        );
        for( $i = 0;  $i < count($values);  $i++ ){
            Product::create($values[$i]);
        }
        
        
    }
}
