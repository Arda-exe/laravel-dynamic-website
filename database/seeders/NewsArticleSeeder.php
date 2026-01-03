<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();

        $articles = [
            [
                'title' => 'Shadow of the Erdtree DLC Announced',
                'slug' => 'shadow-of-the-erdtree-dlc-announced',
                'excerpt' => 'FromSoftware reveals the first major expansion for Elden Ring, taking players to the Land of Shadow.',
                'content' => "The highly anticipated DLC for Elden Ring has been officially announced. Shadow of the Erdtree will introduce new areas, bosses, weapons, and spells to the beloved action RPG.\n\nPlayers will venture into the Land of Shadow, following in the footsteps of Miquella. The expansion promises to deliver the same challenging gameplay and rich lore that fans have come to expect from FromSoftware.\n\nNew features include:\n- Expanded map with multiple new regions\n- Over 10 new boss encounters\n- New weapon types and combat abilities\n- Additional NPCs and questlines\n- New multiplayer features\n\nThe DLC is expected to provide 20-30 hours of additional gameplay for a full playthrough.",
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Best Builds for Patch 1.10',
                'slug' => 'best-builds-for-patch-110',
                'excerpt' => 'Discover the most powerful character builds following the latest balance changes.',
                'content' => "Patch 1.10 has brought significant balance changes to Elden Ring. Here are the top builds currently dominating PvE and PvP:\n\n1. Bleed Arcane Build\nUtilizing Rivers of Blood and the White Mask, this build remains one of the strongest for both boss fights and invasions.\n\n2. Pure Intelligence Sorcerer\nWith buffs to several sorceries, mage builds are more viable than ever. Key spells include Comet Azur and Stars of Ruin.\n\n3. Faith/Strength Paladin\nCombining heavy weapons with incantations creates a versatile playstyle perfect for co-op.\n\n4. Dual Katana Dexterity\nFast, aggressive gameplay with high damage output. Use Moonveil and Meteoric Ore Blade for maximum effect.\n\nEach build requires specific stat distributions and equipment. Experiment to find your perfect playstyle!",
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Malenia Boss Guide: Tips and Strategies',
                'slug' => 'malenia-boss-guide-tips-and-strategies',
                'excerpt' => 'Struggling with the Blade of Miquella? Our comprehensive guide will help you claim victory.',
                'content' => "Malenia, Blade of Miquella, is widely considered one of the most challenging bosses in Elden Ring. Here's how to defeat her:\n\nPhase 1 Strategy:\n- Stay aggressive but measured\n- Dodge her Waterfowl Dance by running away from the first flurry\n- Use a medium shield with high physical damage negation\n- Bleed weapons are particularly effective\n\nPhase 2 Strategy:\n- Watch for her dive bomb attack - roll at the last second\n- The Scarlet Aeonia can be avoided by running to the side\n- Summon Spirit Ashes like Mimic Tear for additional damage\n\nRecommended Stats:\n- Vigor: 50+\n- Endurance: 25+\n- Primary damage stat: 60+\n\nWith patience and practice, victory will be yours!",
                'is_published' => true,
                'published_at' => now()->subWeek(),
            ],
        ];

        foreach ($articles as $article) {
            NewsArticle::create(array_merge($article, ['user_id' => $admin->id]));
        }
    }
}
