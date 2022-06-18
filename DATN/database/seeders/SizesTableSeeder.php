<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sizes')->insert([
            [   
                'size'=>'S',
                'product' => 1,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 1,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 1,
                'status'=>1],

            [   
                'size'=>'S',
                'product' => 2,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 2,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 2,
                'status'=>1],

            [   
                'size'=>'S',
                'product' => 3,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 3,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 3,
                'status'=>1],

            [   
                'size'=>'45mm',
                'product' => 4,
                'status'=>1],

            [   
                'size'=>'100ml',
                'product' => 5,
                'status'=>1],
        ]);
    }
}
