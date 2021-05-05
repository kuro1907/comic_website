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
            'username'          => 'admin',
            'email'        => 'vu.nguyennam.it@gmail.com',
            'password'       => bcrypt('admin'),
            'role'   => 'admin'
        ]);
    }
}
