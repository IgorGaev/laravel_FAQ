<?php

use Illuminate\Database\Seeder;
use Faq\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $defaultPassword = Hash::make('admin');
        User::create(['login'=>'admin','password'=>$defaultPassword]);
    }
}
