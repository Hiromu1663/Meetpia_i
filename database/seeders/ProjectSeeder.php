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
                'title' => 'Want diligent and passionate person.',
                'contents' => "We're looking for mates to start to a restaurant business.

                We need to a passionate and diligent person.
                
                Labor time 8:00~16:00(including extra working 2 hours)
                
                Wage on this task is 20,000.",
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Business',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/06/27 11:11:11',
                'location' => 'cebu',
                'max_number' => 1,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Need a school driver in morning.',
                'contents' => "We're looking for school driver to student's commuting

                in the morning.
                
                Requirement Or Qualifications 
                
                - Punctual
                - Driver's license
                - English skill(The level is graduating high school.)
                
                We're looking forward to meeting you.
                
                We'll talk about salary through an interview.",
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Business',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/08/03 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => '.Recruiting programmer.',
                'contents' => "I'm running start-up company in Cebu.

                I need to person who have knowledge on basic programming like HTML,CSS,Javascript.
                
                Job content
                
                1.Creating web site to advertise our company.
                
                2.Basic Telephone response.
                
                3.Demonstrating function on coding for Philipino people.
                
                The payment is 50,000 per 1 week to depend progress.",
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Business',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/07/04 11:11:11',
                'location' => 'cebu',
                'max_number' => 20,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'The power and creating products with team.',
                'contents' => "We provide component of camera around world from Cebu.

                Now we need to worker to more produce products.
                
                Our location is in Mandue —-.
                
                Labor style and benefit
                
                1.Labor style is shift work,day and night,8:00~17:00,20:00~5:00(including extra working).
                
                2.The salary is 35000 per 1 month.
                
                [3.It](http://3.It) depend your archievement like getting licence and patent through working,we'll promote benefit and up wage.",
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Business',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/09/05 11:11:11',
                'location' => 'cebu',
                'max_number' => 3,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            // hobby
            [
                'title' => 'Going to fishing',
                'contents' => "I love Fishing so much in my heart,I'm looking for mates who  are going to fishing with me on July 20 next month.

                Someone wants to join it(For those interested),please contact me,my phone number  is12-3456-789.",
                'image' => '2.jpg',
                'user_id' => 1,
                'genre' => 'Hobby',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/010/26 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Do you know Yu-gi-oh card?',
                'contents' => "Hi,I play yu-gi-oh with friends in Cebu.

                I'm looking for player to get new strategy on game.
                
                Anyway,take it easy,join us.
                
                We play game in IT park mall. 
                
                I forgot my introduction,I'm Max.
                
                Please give my address, ———.",
                'image' => '3.jpg',
                'user_id' => 2,
                'genre' => 'Hobby',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/07/03 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Bicycle,Bicycle go to somewhere.',
                'contents' => "I'm Young,then I love driving bycycle to travel Cebu.

                I'm looking for mates with me because everytime I'm driving alone.
                
                if you wanna contact me,please contact me online.",
                'image' => '4.jpg',
                'user_id' => 3,
                'genre' => 'Hobby',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/07/04 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Do you like reading book?',
                'contents' => "Recently we have to get insight through reading,so we make chance to reading and discussing through this occasion.

                If you're interested to that,give me your message on our mailbox.",
                'image' => '1.jpg',
                'user_id' => 4,
                'genre' => 'Hobby',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/08/05 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            // study
            [
                'title' => 'Opening Free Conversation',
                'contents' => "1.Do you want to improve your English skill and get experience to meet many people around World

                We'll hold a free conversation to speak English on this weekend in a hotel.
                
                If you want  to join this program,please send a message to our mail box.",
                'image' => '3.jpg',
                'user_id' => 1,
                'genre' => 'Study',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/08/25 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'You wanna know about history on Cebu.',
                'contents' => "Hi,I'm Alex,university student to study subject of history on Cebu.

                I would like to spread to information on Cebu, so open place to teach history to tourist.
                
                If you want join it,please apply form in our website.",
                'image' => '4.jpg',
                'user_id' => 2,
                'genre' => 'Study',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/09/03 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Start to study Japanese.',
                'contents' => "Konnichiwa.

                Do you like anime,manga like Dragon Ball,One Piece.
                
                I'm Satoshi,facilitator on this project,then I hope Philippino people know my country through this chance,so I decided to open this [occasion with Japanese residents in Cebu.](http://occasion.to)
                
                This project is to just provide chence to communicate each countries by speaking Japanese. 
                
                The date is July 15, 17:00.
                
                We provide snack for each persons(That's free!).
                
                We're looking forward to meet you.
                
                こんにちは。
                
                ドラゴンボール、ワンピース、日本のアニメ、漫画は好きですか？
                
                私は、今回の会の進行役のサトシと言います、この機会をとして、フィリピンの人たちに日本を知ってもらおうと思って、日本人にセブの在住者とこの企画を立ち上げようと決めました。
                
                日にちとしては、7月15日です。
                
                フィリピンの人たちと親睦を深めるために、無料でちょっとしたお菓子も提供します。
                
                私たちは、あなたに会うのを楽しみにしています。",
                'image' => '1.jpg',
                'user_id' => 3,
                'genre' => 'Study',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/07/04 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Studying Programming to get future',
                'contents' => "You want to start to get new sight or spread you world.

                if you so,Let's start to programming.
                
                What kind of language do we study?
                
                - PHP
                - Javascript
                
                At first we'll teach you HTML and CSS as Basic coding.
                
                If you're interested,please apply for our form.",
                'image' => '2.jpg',
                'user_id' => 4,
                'genre' => 'Study',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/07/05 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            // trade
            [
                'title' => 'Somebody needs home appliances in Cebu?',
                'contents' => "Recently I decided to leave Cebu for job,so  I don't need  some home appliances like a fridge before leaving.

                If you need something on a home appliance,please give me a message online till June 30 before  I leave.",
                'image' => '4.jpg',
                'user_id' => 1,
                'genre' => 'Trade',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/08/02 11:11:11',
                'location' => 'cebu',
                'max_number' =>10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'You want to get classic furniture?',
                'contents' => "I want to sell classic furnitures in my home.I want to tidy up my room,so I want to remove some furniture.

                If someone get funitures,Please send me to mail.",
                'image' => '1.jpg',
                'user_id' => 2,
                'genre' => 'Trade',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/08/03 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'Selling motorbicycle.',
                'contents' => "I want to change bicycle to sell old one.

                The price on motorbicycle is 35000 peso.
                
                How about my motorbicycle?",
                'image' => '2.jpg',
                'user_id' => 3,
                'genre' => 'Trade',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/09/04 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => '',
                'contents' => 'test4',
                'image' => '3.jpg',
                'user_id' => 4,
                'genre' => 'Trade',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/09/05 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            // others
            [
                'title' => 'Selling car.',
                'contents' => "I'll move to Japan for work,so I want to sell my car for make budgets to live in there at moment.

                The price on old 2 million peso.
                
                The type of car is Fortune.
                
                If you want to buy my car,please contact me in my decided place." ,
                'image' => '1.jpg',
                'user_id' => 1,
                'genre' => 'Others',
                'start_time' => '2023/01/01 11:11:11',
                'end_time' => '2023/08/02 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test2',
                'contents' => 'test2',
                'image' => '2.jpg',
                'user_id' => 2,
                'genre' => 'Others',
                'start_time' => '2023/01/02 11:11:11',
                'end_time' => '2023/08/03 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test3',
                'contents' => 'test3',
                'image' => '3.jpg',
                'user_id' => 3,
                'genre' => 'Others',
                'start_time' => '2023/01/03 11:11:11',
                'end_time' => '2023/09/04 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'title' => 'test4',
                'contents' => 'test4',
                'image' => '4.jpg',
                'user_id' => 4,
                'genre' => 'Others',
                'start_time' => '2023/01/04 11:11:11',
                'end_time' => '2023/09/05 11:11:11',
                'location' => 'cebu',
                'max_number' => 10,
                'hot' => 0,
                'created_at' => '2023/01/01 11:11:11'
            ],
        ]);
    }
}
