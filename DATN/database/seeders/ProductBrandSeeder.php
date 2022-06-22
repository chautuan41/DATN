<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductBrand;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_brands')->insert([
            [   'product_brand_name'=>'Gucci',
                'status'=>1],
            [   'product_brand_name'=>'Dior',
                'status'=>1],
            [   'product_brand_name'=>'Louis Vuitton',
                'status'=>1],
            [   'product_brand_name'=>'Rolex',
                'status'=>1],
            [   'product_brand_name'=>'Versace',
                'status'=>1],
        ]);
    }
}