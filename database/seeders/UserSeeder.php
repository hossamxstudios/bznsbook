<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@bznsbook.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('super-admin');

        $admin = User::create([
            'name' => 'Site Manager',
            'email' => 'manager@bznsbook.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        $moderator = User::create([
            'name' => 'Content Moderator',
            'email' => 'moderator@bznsbook.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $moderator->assignRole('moderator');
    }
}
