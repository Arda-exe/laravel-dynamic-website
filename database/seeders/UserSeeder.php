<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
            'bio' => 'System Administrator',
        ]);

        // Attach admin role
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $admin->roles()->attach($adminRole);
        }

        // Create demo users
        $demoUsers = [
            [
                'name' => 'John Tarnished',
                'username' => 'johntarnished',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'bio' => 'An Elden Ring enthusiast',
            ],
            [
                'name' => 'Jane Elden',
                'username' => 'janeelden',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'bio' => 'Exploring the Lands Between',
            ],
        ];

        $userRole = Role::where('name', 'user')->first();

        foreach ($demoUsers as $userData) {
            $user = User::create($userData);
            if ($userRole) {
                $user->roles()->attach($userRole);
            }
        }
    }
}
