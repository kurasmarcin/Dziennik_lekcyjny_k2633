<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Uczeń',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'student')->first()->id,
        ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);
        User::create([
            'name' => 'Nauczyciel',
            'email' => 'teacher@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'teacher')->first()->id,
        ]);
    }
}

