<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'  =>  'admin',
            'password'  =>  'Xpdzs92206#!@',
            'email'     =>  'vanthon2206@gmail.com',
            'role'      =>  'admin'
        ]);
        DB::table('users')->insert([
            'username'  =>  'vanthon1907',
            'password'  =>  'Xpdzs92206#!@',
            'email'     =>  'kuro1907@gmail.com',
            'role'      =>  'user'
        ]);
    }
}
