<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Owner
        User::create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('owner123'),
            'role' => 'owner'
        ]);
    }
}
