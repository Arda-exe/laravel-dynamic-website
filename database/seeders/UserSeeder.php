<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'role' => 'admin',
            'bio' => 'System Administrator',
        ]);

        // Create demo users
        $demoUsers = [
            [
                'name' => 'tarnished_001234',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'bio' => 'An Elden Ring enthusiast',
            ],
            [
                'name' => 'tarnished_005678',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'bio' => 'Exploring the Lands Between',
            ],
        ];

        foreach ($demoUsers as $userData) {
            User::create($userData);
        }
    }
}
