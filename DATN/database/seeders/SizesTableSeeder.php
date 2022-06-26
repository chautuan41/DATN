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
                'size'=>'S',
                'product' => 4,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 4,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 4,
                'status'=>1],

            [   
                'size'=>'S',
                'product' => 5,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 5,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 5,
                'status'=>1],
            [   
                'size'=>'S',
                'product' => 6,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 6,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 6,
                'status'=>1],
            [   
                'size'=>'S',
                'product' => 7,
                'status'=>1],
            [   
                'size'=>'M',
                'product' => 7,
                'status'=>1],
            [   
                'size'=>'L',
                'product' => 7,
                'status'=>1],
            [   
                'size'=>'29',
                'product' => 8,
                'status'=>1],
            [   
                'size'=>'30',
                'product' => 8,
                'status'=>1],
            [   
                'size'=>'31',
                'product' => 8,
                'status'=>1],
            [   
                'size'=>'32',
                'product' => 8,
                'status'=>1],
            [   
                'size'=>'33',
                'product' => 8,
                'status'=>1],

            [   
                'size'=>'28mm',
                'product' => 9,
                'status'=>1],

            [   
                'size'=>'43MM',
                'product' => 10,
                'status'=>1],
        ]);
    }
}
