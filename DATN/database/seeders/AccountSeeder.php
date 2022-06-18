<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = new Account();
        $account->email = 'contact.thien.16@gmail.com';
        $account->password = Hash::make('1234567');
        $account->full_name ='Khách Hàng';
        $account->phone = '0123456789';
        $account->address = 'Tp Hồ Chí Minh';
        $account->date_of_birth = '16/07/2001';
        $account->avatar = 'empty';
        $account->role = 1;
        $account->status = 1 ;
        $account->save();

        DB::table('accounts')->insert([
            [   
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Quản Lý',
                'phone'=>'0907999999',
                'address'=>'VietNam',
                'date_of_birth'=>'11/11/2001',
                'avatar'=>'empty',
                'role'=>2
            ],
            [   
                'email'=>'adminwatches@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Admin Watches Store',
                'phone'=>'0907888888',
                'address'=>'VietNam',
                'date_of_birth'=>'11/11/2001',
                'avatar'=>'empty',
                'role'=>3
            ],
            [
                'email'=>'adminclothing@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Admin Clothing Store',
                'phone'=>'0907666666',
                'address'=>'VietNam',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>4
            ],
            [   
                'email'=>'adminseller@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Admin Seller',
                'phone'=>'0907797979',
                'address'=>'VietNam',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>5
            ],
            [   
                'email'=>'nvk01@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Thiện Trần',
                'phone'=>'09073686868',
                'address'=>'VietNam',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>6
            ],
            [   
                'email'=>'nv01@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Tuấn Võ',
                'phone'=>'0907111111',
                'address'=>'Thailand',
                'date_of_birth'=>'11/11/2001',
                'avatar'=>'empty',
                'role'=>7
            ],
        ]);
    }
}
