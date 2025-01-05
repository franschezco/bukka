<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert Default Users
        User::updateOrCreate(
            ['email' => 'leowhiskey9@gmail.com'],
            [
                'name' => 'Francis112',
                'email' => 'leowhiskey9@gmail.com',
                'usertype' => 0,
                'password' => Hash::make('123456789'), // Change 'password123' to your preferred password
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin-bukka@gmail.com'],
            [
                'name' => 'Bukka admin',
                'email' => 'admin-bukka@gmail.com',
                'usertype' => 1, // Admin usertype
                'password' => Hash::make('123456789'), // Change 'admin123' to your preferred admin password
            ]
        );
    }
}

