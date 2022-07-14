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
                
                'supplier_name'=>'Adidas',
                'phone'=>'053999999',
                'address'=>'Italia',
                'status'=>1],
            [   
                
                'supplier_name'=>'Audemars Piguet',
                'phone'=>'053888888',
                'address'=>'France',
                'status'=>1],
            [   
                
                'supplier_name'=>'Balenciaga',
                'phone'=>'054777777',
                'address'=>'France',
                'status'=>1],
            [   
                
                'supplier_name'=>'Burberry',
                'phone'=>'054777777',
                'address'=>'Switzerland ',
                'status'=>1],
            [   
                
                'supplier_name'=>'Catier',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],
            [   
                
                'supplier_name'=>'Chanel',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                
                'supplier_name'=>'Fear Of God',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                
                'supplier_name'=>'Ralph Lauren',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                
                'supplier_name'=>'Rolex',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
                
                'supplier_name'=>'Saint Laurent',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
            [   
            
                'supplier_name'=>'Versace',
                'phone'=>'054777777',
                'address'=>'Italia',
                'status'=>1],  
    ]);
    }
}
