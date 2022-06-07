<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Supplier;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [   
                'supplier_id'=>'SL_01',
                'supplier_name'=>'Gucci',
                'phone'=>'053999999',
                'address'=>'Thailand',
                'status'=>1],
            [   
                'supplier_id'=>'SL_02',
                'supplier_name'=>'Dior',
                'phone'=>'053888888',
                'address'=>'Spain',
                'status'=>1],
            [   
                'supplier_id'=>'SL_01',
                'supplier_name'=>'LV',
                'phone'=>'054777777',
                'address'=>'Argentina',
                'status'=>1],
        ]);
    }
}
