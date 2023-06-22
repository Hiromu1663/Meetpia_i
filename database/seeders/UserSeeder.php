<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\SUpport\Facades\Hash;

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
            [
                'name' => 'Yukimasa Hiromu',
                'email' => 'Hiromu@test.com',
                'phoneNumber' => '1234567890',
                'gender' => 'Male',
                'birth_year' => '2000',
                'birth_month' => '1',
                'birth_day' =>  '1',
                'address' => 'test',
                'status' => 'test',
                'password' => Hash::make('test123'),
                'created_at' => '2023/01/01 11:11:11',
            ],
            [
                'name' => 'Masuko Toru',
                'email' => 'toru@test.com',
                'phoneNumber' => '1234567891',
                'gender' => 'Male',
                'birth_year' => '2000',
                'birth_month' => '1',
                'birth_day' =>  '1',
                'address' => 'test',
                'status' => 'test',
                'password' => Hash::make('test123'),
                'created_at' => '2023/01/01 11:11:11',
            ],
            [
                'name' => 'Hioki Megumi',
                'email' => 'megumi@test.com',
                'phoneNumber' => '1234567892',
                'gender' => 'Female',
                'birth_year' => '2000',
                'birth_month' => '1',
                'birth_day' =>  '1',
                'address' => 'test',
                'status' => 'test',
                'password' => Hash::make('test123'),
                'created_at' => '2023/01/01 11:11:11',
            ],
            [
                'name' => 'Takao Yuki',
                'email' => 'Takao@test.com',
                'phoneNumber' => '1234567893',
                'gender' => 'Male',
                'birth_year' => '2000',
                'birth_month' => '1',
                'birth_day' =>  '1',
                'address' => 'test',
                'status' => 'test',
                'password' => Hash::make('test123'),
                'created_at' => '2023/01/01 11:11:11',
            ],
        ]);
    }
}
