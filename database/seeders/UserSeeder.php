<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('test1234'),
                'role' => 1,
            ],
            [
                'name' => 'manager',
                'email' => 'manager@test.com',
                'password' => Hash::make('test1234'),
                'role' => 5,
            ],
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('test1234'),
                'role' => 9,
            ],
        ]);
    }
}
