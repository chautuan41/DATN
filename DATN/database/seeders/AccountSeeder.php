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
                'full_name'=>'Admin',
                'phone'=>'0907999999',
                'address'=>'VietNam',
                'date_of_birth'=>'11/11/2001',
                'avatar'=>'empty',
                'role'=>2
            ],
            [   
                'email'=>'warehousestaff@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'WareHouse Staff',
                'phone'=>'0907797979',
                'address'=>'VietNam',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>3
            ],
            [   
                'email'=>'sellerstaff@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Seller Staff',
                'phone'=>'09073686868',
                'address'=>'VietNam',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>4
            ],
            [   
                'email'=>'ctyuan41@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Châu Tuấn',
                'phone'=>'0907111111',
                'address'=>'Thailand',
                'date_of_birth'=>'11/11/2001',
                'avatar'=>'empty',
                'role'=>1
            ],
        ]);
    }
}
