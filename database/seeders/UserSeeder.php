<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'user1',
            'email'=>'user1@gmail.com',
            'password'=>'user1123',
            'phoneNumber'=>'083366455337',
        ]);
    }
}
