<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImportInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('import_invoices')->insert([

            [   


                'date' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 100,
                'account' => 1,
                'supplier'=> 1,
                'status'=>1],

            [   

                'date' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 299,
                'account' => 1,
                'supplier'=> 1,
                'status'=>1],

            [   

                'date' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 399,
                'account' => 1,
                'supplier'=> 2,
                'status'=>1],

            [   

                'date' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 499,
                'account' => 1,
                'supplier'=> 2,
                'status'=>1],
        ]);
    }
}
