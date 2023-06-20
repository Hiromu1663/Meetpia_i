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
            'name' => 'test',
            'email' => 'test@test.com',
            'phoneNumber' => '1234567890',
            'gender' => 'test',
            'age' => '100',
            'address' => 'test',
            'status' => 'test',
            'password' => Hash::make('test123'),
            'created_at' => '2023/01/01 11:11:11',
        ]);
    }
}
