<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            // business
            [
                'title' => '翻訳家募集！',
                'contents' => '日本語から英語に翻訳できる方を募集しています！',
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Business',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/01/02 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'プログラマー募集',
                'contents' => 'PHPできる人いませんか?',
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Business',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/01/03 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'スキマ時間でお小遣い稼ぎしませんか？',
                'contents' => 'ちょっとしたスキマ時間でお小遣い稼ぎできちゃいます',
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Business',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/01/04 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'cebuで英語を使ってできる仕事探してます。',
                'contents' => '現在、cebuで英語を使ってできる仕事探してます。',
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Business',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/01/05 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            // hobby
            [
                'title' => 'test',
                'contents' => 'test',
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Hobby',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/01/02 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test2',
                'contents' => 'test2',
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Hobby',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/01/03 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test3',
                'contents' => 'test3',
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Hobby',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/01/04 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test4',
                'contents' => 'test4',
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Hobby',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/01/05 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            // study
            [
                'title' => 'test',
                'contents' => 'test',
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Study',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/01/02 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test2',
                'contents' => 'test2',
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Study',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/01/03 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test3',
                'contents' => 'test3',
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Study',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/01/04 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test4',
                'contents' => 'test4',
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Study',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/01/05 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            // trade
            [
                'title' => 'test',
                'contents' => 'test',
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Trade',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/01/02 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test2',
                'contents' => 'test2',
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Trade',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/01/03 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test3',
                'contents' => 'test3',
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Trade',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/01/04 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test4',
                'contents' => 'test4',
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Trade',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/01/05 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            // others
            [
                'title' => 'test',
                'contents' => 'test',
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Others',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/01/02 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test2',
                'contents' => 'test2',
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Others',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/01/03 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test3',
                'contents' => 'test3',
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Others',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/01/04 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test4',
                'contents' => 'test4',
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Others',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/01/05 11:11:11',
                'location' => 'cebu',
                'created_at' => '2023/01/01 11:11:11'
            ],
        ]);
    }
}
