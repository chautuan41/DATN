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
                'discount'=>0,
                'like'=>999,
                'product_type' => 1,
                'supplier' => 1,
                'status'=>1],
            [   
                'product_id'=>'PD_02',
                'sku'=>'SKU_02',
                'product_name'=>'T-Shirt',
                'price'=>200,
                'discount'=>0,
                'like'=>777,
                'product_type' => 1,
                'supplier' => 1,
                'status'=>1],
            [   'product_id'=>'PD_03',
                'sku'=>'SKU_03',
                'product_name'=>'T-Shirt',
                'price'=>450,
                'discount'=>0,
                'like'=>666,
                'product_type' => 1,
                'supplier' => 1,
                'status'=>1],
        ]);
    }
}
