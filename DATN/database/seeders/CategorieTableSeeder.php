<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [   'categories_name'=>'Clothing',
                'status'=>1],
            [   'categories_name'=>'Watches',
                'status'=>1],
        ]);
    }
}
