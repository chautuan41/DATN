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
                'supplier_id'=>'SG_01',
                'supplier_name'=>'Gucci',
                'phone'=>'053999999',
                'address'=>'Italia',
                'status'=>1],
            [   
                'supplier_id'=>'SD_01',
                'supplier_name'=>'Dior',
                'phone'=>'053888888',
                'address'=>'France',
                'status'=>1],
            [   
                'supplier_id'=>'SLV_01',
                'supplier_name'=>'Louis Vuitton',
                'phone'=>'054777777',
                'address'=>'France',
                'status'=>1],
            [   
                'supplier_id'=>'SR_01',
                'supplier_name'=>'Rolex',
                'phone'=>'054777777',
                'address'=>'Switzerland ',
                'status'=>1],
            [   
                'supplier_id'=>'SV_01',
                'supplier_name'=>'Versace',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],
            [   
                'supplier_id'=>'SSL_01',
                'supplier_name'=>'Sanint Laurent',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                'supplier_id'=>'SRL_01',
                'supplier_name'=>'Ralph Lauren',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                'supplier_id'=>'SA_01',
                'supplier_name'=>'Adidas',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                'supplier_id'=>'SP_01',
                'supplier_name'=>'Puma',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                'supplier_id'=>'SFOG_01',
                'supplier_name'=>'Fear Of God',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
    ]);
    }
}
