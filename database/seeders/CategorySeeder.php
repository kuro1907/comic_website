<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Truyện Hàn'
        ]);
        DB::table('categories')->insert([
            'name' => 'Truyện Nhật'
        ]);
        DB::table('categories')->insert([
            'name' => 'Truyện Trung'
        ]);
        DB::table('categories')->insert([
            'name' => 'Hành động'
        ]);
        DB::table('categories')->insert([
            'name' => 'Hài hước'
        ]);
        DB::table('categories')->insert([
            'name' => 'Phiêu lưu'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kinh dị'
        ]);
        DB::table('categories')->insert([
            'name' => 'Viễn tưởng'
        ]);
        DB::table('categories')->insert([
            'name' => 'Chuyển sinh'
        ]);
        DB::table('categories')->insert([
            'name' => 'Phép thuật'
        ]);
        DB::table('categories')->insert([
            'name' => 'Thể thao'
        ]);
        DB::table('categories')->insert([
            'name' => 'Lãng mạn'
        ]);
        DB::table('categories')->insert([
            'name' => 'Tu tiên'
        ]);
        DB::table('categories')->insert([
            'name' => 'Game'
        ]);
        DB::table('categories')->insert([
            'name' => 'Võ thuật'
        ]);
    }
}
