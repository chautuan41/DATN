<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([

            [   
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 100,
                'shipping_address' => 'Italian',
                'account' => 1,
                'status'=>1],

            [   
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 299,
                'shipping_address' => 'Laos',
                'account' => 1,
                'status'=>1],

            [   
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 399,
                'shipping_address' => 'VietNam',
                'account' => 1,
                'status'=>1],

            [   
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'total' => 499,
                'shipping_address' => 'Thailand',

                'account' => 1,
                'status'=>1],
        ]);
    }
}
