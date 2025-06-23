<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@voltex.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Normal User',
            'email' => 'user@voltex.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
