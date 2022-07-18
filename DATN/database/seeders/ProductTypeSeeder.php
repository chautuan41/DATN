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
            [   'product_type_name'=>'T-Shirt | Polo Shirt',
                'categories'=>1,
                'status'=>1],
            [   'product_type_name'=>'Shirt',
                'categories'=>1,
                'status'=>1],
            [   'product_type_name'=>'Pants | Shorts',
                'categories'=>1,
                'status'=>1],
            [   'product_type_name'=>'Jackets | Coats',
                'categories'=>1,
                'status'=>1],
            [   'product_type_name'=>'Denim',
                'categories'=>1,
                'status'=>1],

            [   'product_type_name'=>'Luxury',
                'categories'=>2,
                'status'=>1],
            [   'product_type_name'=>'Sport',
                'categories'=>2,
                'status'=>1],
        ]);
    }
}
