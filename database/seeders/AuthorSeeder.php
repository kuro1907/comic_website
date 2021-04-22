<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Chu-Gong',
            'dayBirth' => date("Y-m-d"),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium corrupti suscipit, impedit, consectetur totam nulla maiores ipsa eligendi, commodi assumenda fugit! Quam, iure. Officia iure accusantium soluta corporis praesentium!',
            'img' => '/storage/img/solo-leveling/toi-thang-cap-mot-minh-ss2.jpg'
        ]);

        DB::table('authors')->insert([
            'name' => 'TurtleMe',
            'dayBirth' => date("Y-m-d"),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium corrupti suscipit, impedit, consectetur totam nulla maiores ipsa eligendi, commodi assumenda fugit! Quam, iure. Officia iure accusantium soluta corporis praesentium!',
            'img' => '/storage/img/the-beginning-after-the-end/images.jpg'
        ]);
    }
}
