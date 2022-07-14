<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
            [   'brand_name'=>'Adidas',
                'status'=>1],
            [   'brand_name'=>'Audemars Piguet',
                'status'=>1],
            [   'brand_name'=>'Balenciaga',
                'status'=>1],
            [   'brand_name'=>'Burberry',
                'status'=>1],
            [   'brand_name'=>'Catier',
                'status'=>1],
            [   'brand_name'=>'Chanel',
                'status'=>1],
            [   'brand_name'=>'Fear Of God',
                'status'=>1],
            [   'brand_name'=>'Ralph Lauren',
                'status'=>1],
            [   'brand_name'=>'Rolex',
                'status'=>1],
            [   'brand_name'=>'Saint Laurent',
                'status'=>1],
            [   'brand_name'=>'Versace',
                'status'=>1],
        ]);
        
    }
}
