<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            [   'product_type_name'=>'T-Shirt',
                'status'=>1],
            [   'product_type_name'=>'Shirt',
                'status'=>1],
            [   'product_type_name'=>'Pants',
                'status'=>1],
            [   'product_type_name'=>'Shorts',
                'status'=>1],
            [   'product_type_name'=>'Jeans',
                'status'=>1],
            [   'product_type_name'=>'Watches',
                'status'=>1],
            [   'product_type_name'=>'Fragrances',
                'status'=>1],
        ]);
    }
}
