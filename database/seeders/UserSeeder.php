<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // -----------------------------
        // 1. Admin User
        // -----------------------------
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'phone' => '01776197999',
                'phone_2' => '01776197999',
                'password' => Hash::make('AAaa00@@'),
                'profile_picture' => null,
                'two_factor_enabled' => 0,
                'session_timeout' => 5,
                'is_maintenance' => 0,
                'is_banned' => 0,
            ]
        );
        $admin->assignRole('admin');

      
    }
}
