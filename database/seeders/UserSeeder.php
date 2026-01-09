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
        // Create 3 admin users
        $admins = [
            [
                'name' => 'admin_master',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'role' => 'admin',
                'bio' => 'Chief System Administrator and Community Manager',
            ],
            [
                'name' => 'moderator_ranni',
                'email' => 'mod1@ehb.be',
                'password' => Hash::make('Password!321'),
                'role' => 'admin',
                'bio' => 'Content Moderator and Lore Expert',
            ],
            [
                'name' => 'moderator_melina',
                'email' => 'mod2@ehb.be',
                'password' => Hash::make('Password!321'),
                'role' => 'admin',
                'bio' => 'Community Support and Event Coordinator',
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }

        // Create 20 regular users
        $userNames = [
            'tarnished_warrior', 'elden_lord_seeker', 'maiden_protector', 'rune_hunter',
            'grace_follower', 'radagon_champion', 'malenia_survivor', 'godrick_slayer',
            'rennala_student', 'radahn_challenger', 'morgott_defeater', 'mohg_fighter',
            'astel_vanquisher', 'fire_giant_victor', 'maliketh_hunter', 'godfrey_challenger',
            'placidusax_seeker', 'fortissax_warrior', 'lichdragon_fighter', 'ancient_hero'
        ];

        $bios = [
            'Seeking to become the Elden Lord',
            'Exploring every corner of the Lands Between',
            'Master of incantations and sorceries',
            'Strength build enthusiast',
            'Dexterity weapons specialist',
            'Faith build paladin',
            'Intelligence mage explorer',
            'Quality build versatility',
            'PvP arena champion',
            'Co-op helper extraordinaire',
            'Lore enthusiast and item collector',
            'Speed runner in training',
            'Fashion souls advocate',
            'Challenge run specialist',
            'Boss strategy theorist',
            'Build optimizer',
            'Completionist attempting 100%',
            'Casual explorer enjoying the journey',
            'Veteran Souls player',
            'New to FromSoftware games'
        ];

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $userNames[$i],
                'email' => 'user' . ($i + 1) . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'bio' => $bios[$i],
                'birthday' => now()->subYears(rand(18, 45))->subDays(rand(0, 365)),
            ]);
        }
    }
}
