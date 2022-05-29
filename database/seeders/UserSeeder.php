<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = User::create([
            'name'=>'user1',
            'email'=>'user123@gmail.com',
            'password'=>Hash::make('user123'),
            'phoneNumber'=>'083366455337',
        ]);
    }
}
