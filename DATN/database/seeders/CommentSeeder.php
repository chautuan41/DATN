<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [   'comment' => 'Test Comment 00',
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'product' => '1',
                'account' => '1',
                'status'=>1],

            [   'comment' => 'Test Comment 01',
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'product' => '1',
                'account' => '1',
                'status'=>1],

            [   'comment' => 'Test Comment 02',
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'product' => '2',
                'account' => '1',
                'status'=>1],

            [   'comment' => 'Test Comment 03',
                'date_time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'product' => '2',
                'account' => '1',
                'status'=>1],
        ]);
    }
}