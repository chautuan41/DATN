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
        $account->email = 'admin@gmail.com';
        $account->password = Hash::make('1234567');
        $account->full_name ='account_01';
        $account->phone = '0123456789';
        $account->address = 'Tp Hồ Chí Minh';
        $account->date_of_birth = '16/07/2001';
        $account->avatar = 'empty';
        $account->role = 2;
        $account->status = 1 ;
        $account->save();

        DB::table('accounts')->insert([
            [   
                'email'=>'contact.thien.16@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Thiện Trần',
                'phone'=>'053999999',
                'address'=>'Thailand',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>1],
            [   
                'email'=>'nvk01@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Thiện Trần',
                'phone'=>'053999999',
                'address'=>'Thailand',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>3],
            [   
                'email'=>'nv01@gmail.com',
                'password'=>bcrypt('1234567'),
                'full_name'=>'Thiện Trần',
                'phone'=>'053999999',
                'address'=>'Thailand',
                'date_of_birth'=>'16/07/2001',
                'avatar'=>'empty',
                'role'=>4],
            
        ]);
    }
}
