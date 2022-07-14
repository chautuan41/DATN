<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [   'role_name'=>'Customer',
                'status'=>1],
            [   'role_name'=>'Admin',
                'status'=>1],
            [   'role_name'=>'Watches Staff',
                'status'=>1],
            [   'role_name'=>'Clothing Staff',
                'status'=>1],
            [   'role_name'=>'WareHouse Staff',
                'status'=>1],
            [   'role_name'=>'Saler',
                'status'=>1],
            [   'role_name'=>'Nhân viên bán hàng',
                'status'=>1],
        ]);
    }
}
