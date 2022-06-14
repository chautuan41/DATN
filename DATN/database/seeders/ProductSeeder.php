<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [   
                'product_id'=>'PD_01',
                'sku'=>'SKU_01',
                'product_name'=>'T-Shirt',
                'price'=>100,
                'amount'=>1111,
                'discount'=>0,
                'like'=>999,
                'image'=>'T-Shirt.jpg',
                'product_type' => 1,
                'supplier' => 1,
                'status'=>1],

            [   
                'product_id'=>'PD_02',
                'sku'=>'SKU_02',
                'product_name'=>'Shirt',
                'price'=>200,
                'amount'=>1607,
                'discount'=>0,
                'like'=>777,
                'image'=>'T-Shirt.jpg',
                'product_type' => 2,
                'supplier' => 2,
                'status'=>1],

            [   'product_id'=>'PD_03',
                'sku'=>'SKU_03',
                'product_name'=>'Pants',
                'price'=>450,
                'amount'=>2001,
                'discount'=>0,
                'like'=>666,
                'image'=>'T-Shirt.jpg',
                'product_type' => 3,
                'supplier' => 3,
                'status'=>1],

            [   'product_id'=>'PD_04',
                'sku'=>'SKU_04',
                'product_name'=>'Watches',
                'price'=>450,
                'amount'=>2001,
                'discount'=>0,
                'like'=>666,
                'image'=>'T-Shirt.jpg',
                'product_type' => 4,
                'supplier' => 5,
                'status'=>1],

            [   'product_id'=>'PD_05',
                'sku'=>'SKU_05',
                'product_name'=>'Fragrances',
                'price'=>450,
                'amount'=>2001,
                'discount'=>0,
                'like'=>666,
                'image'=>'T-Shirt.jpg',
                'product_type' => 5,
                'supplier' => 4,
                'status'=>1],
        ]);
    }
}
