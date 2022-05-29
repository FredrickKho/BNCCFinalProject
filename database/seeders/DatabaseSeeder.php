<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user123',
            'email' => 'user123@gmail.com',
            'password' => Hash::make('user123'),
            'Admin_ID' => 'tommy',
            'phoneNumber' => '084466355447',
        ]);
        DB::table('users')->insert([
            'name' => 'user321',
            'email' => 'user321@gmail.com',
            'password' => Hash::make('user123'),
            'phoneNumber' => '084466355448',
        ]);
    }
}
