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
                'email' => 'admin@mail.com',
                'password' => Hash::make('test1234'),
                'role' => 1,
            ],
            [
                'name' => 'manager',
                'email' => 'manager@mail.com',
                'password' => Hash::make('test1234'),
                'role' => 5,
            ],
            [
                'name' => 'test',
                'email' => 'test@mail.com',
                'password' => Hash::make('test1234'),
                'role' => 9,
            ],
        ]);
    }
}
