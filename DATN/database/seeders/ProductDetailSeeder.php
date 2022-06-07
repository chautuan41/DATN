<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_details')->insert([
            [   'amount'=>'1111',
                'size'=>'S',
                'product' => 1,
                'status'=>1],
            [   'amount'=>'1607',
                'size'=>'M',
                'product' => 1,
                'status'=>1],
            [   'amount'=>'2001',
                'size'=>'L',
                'product' => 1,
                'status'=>1],
        ]);
    }
}
