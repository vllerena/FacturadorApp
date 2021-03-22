<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Victor Llerena',
            'email' => 'victor@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('victor123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
