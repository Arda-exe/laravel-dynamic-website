<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Administrator with full access',
            ],
            [
                'name' => 'moderator',
                'description' => 'Moderator with content management access',
            ],
            [
                'name' => 'user',
                'description' => 'Regular user',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
