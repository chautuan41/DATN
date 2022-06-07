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
        $account->email = 'account01@gmail.com';
        $account->password = Hash::make('1234567');
        $account->full_name ='account_01';
        $account->phone = '0123456789';
        $account->address = 'Tp Hồ Chí Minh';
        $account->date_of_birth = '16/07/2001';
        $account->avatar = 'empty';
        $account->role = 1;
        $account->status = 1 ;
        $account->save();
    }
}
