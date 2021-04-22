<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert([
            'name'          => 'Solo Leveling',
            'description'   => 'Xa xưa thì  những Cánh Cổng kết nối thế giới thật với thế giới ma thú luôn luôn đóng lại vậy mà vào mười năm trước đã được mở ra. Thợ săn là những con người có được siêu năng lực chiến đấu với các ma thú khi cảnh cống kết nối được mở ra.</br>Tuy nhiên, những người thợ săn đó không phải ai cũng mạnh.',
            'status'        => 1,
            'img'           => '/storage/img/solo-leveling/toi-thang-cap-mot-minh-ss2.jpg',
            'cover_img'     => '/storage/img/solo-leveling/solo-leveling-coverimg.png',
            'slide'         => 1,
            'author_id'     => 1
        ]);

        DB::table('comics')->insert([
            'name'          => 'The Beginning After The End',
            'description'   => 'Xa xưa thì  những Cánh Cổng kết nối thế giới thật với thế giới ma thú luôn luôn đóng lại vậy mà vào mười năm trước đã được mở ra. Thợ săn là những con người có được siêu năng lực chiến đấu với các ma thú khi cảnh cống kết nối được mở ra.</br>Tuy nhiên, những người thợ săn đó không phải ai cũng mạnh.',
            'status'        => 1,
            'img'           => '/storage/img/the-beginning-after-the-end/images.jpg',
            'cover_img'     => '/storage/img/the-beginning-after-the-end/thumb-1920-1135889.jpg',
            'slide'         => 0,
            'author_id'     => 2
        ]);
    }
}
