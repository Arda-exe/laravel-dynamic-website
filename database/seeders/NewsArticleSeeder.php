<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admins = User::where('role', 'admin')->get();

        $articles = [
            [
                'title' => 'Shadow of the Erdtree DLC Announced',
                'excerpt' => 'FromSoftware reveals the first major expansion for Elden Ring, taking players to the Land of Shadow.',
                'content' => "The highly anticipated DLC for Elden Ring has been officially announced. Shadow of the Erdtree will introduce new areas, bosses, weapons, and spells to the beloved action RPG.\n\nPlayers will venture into the Land of Shadow, following in the footsteps of Miquella. The expansion promises to deliver the same challenging gameplay and rich lore that fans have come to expect from FromSoftware.\n\nNew features include:\n- Expanded map with multiple new regions\n- Over 10 new boss encounters\n- New weapon types and combat abilities\n- Additional NPCs and questlines\n- New multiplayer features\n\nThe DLC is expected to provide 20-30 hours of additional gameplay for a full playthrough.",
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Best Builds for Patch 1.10',
                'excerpt' => 'Discover the most powerful character builds following the latest balance changes.',
                'content' => "Patch 1.10 has brought significant balance changes to Elden Ring. Here are the top builds currently dominating PvE and PvP:\n\n1. Bleed Arcane Build - Utilizing Rivers of Blood and the White Mask\n2. Pure Intelligence Sorcerer - Comet Azur and Stars of Ruin reign supreme\n3. Faith/Strength Paladin - Versatile for co-op play\n4. Dual Katana Dexterity - Fast and aggressive gameplay\n\nEach build requires specific stat distributions and equipment. Experiment to find your perfect playstyle!",
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Malenia Boss Guide: Tips and Strategies',
                'excerpt' => 'Struggling with the Blade of Miquella? Our comprehensive guide will help you claim victory.',
                'content' => "Malenia, Blade of Miquella, is widely considered one of the most challenging bosses in Elden Ring. Phase 1: Stay aggressive, dodge Waterfowl Dance. Phase 2: Watch for dive bombs and Scarlet Aeonia. Bleed weapons are highly effective. Recommended Vigor: 50+",
                'is_published' => true,
                'published_at' => now()->subWeek(),
            ],
            [
                'title' => 'Hidden Locations You Might Have Missed',
                'excerpt' => 'Explore secret areas and dungeons throughout the Lands Between.',
                'content' => "The Lands Between is filled with hidden locations. Don't miss Mohgwyn Palace, accessed via Varre's questline or the teleporter in Consecrated Snowfield. Discover the Haligtree by collecting both halves of the secret medallion. Explore Deeproot Depths through a secret coffin ride in Siofra River.",
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Speedrunning Community Breaks Record',
                'excerpt' => 'New world record set for Any% category at under 20 minutes.',
                'content' => "The Elden Ring speedrunning community continues to push boundaries. A new world record has been set in the Any% category, completing the game in under 20 minutes using clever routing and glitches. The runner utilized the zip glitch to skip major portions of the game, including several mandatory boss fights.",
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'PvP Meta: Current Dominant Strategies',
                'excerpt' => 'Learn about the most effective PvP builds and tactics in the current meta.',
                'content' => "The PvP meta has evolved significantly. Bleed builds remain strong but have counters. Poise stacking with heavy armor is viable. Dual spears offer excellent range control. Magic builds struggle against aggressive opponents. Learn to parry for massive damage opportunities.",
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Lore Deep Dive: The Shattering Explained',
                'excerpt' => 'Understanding the events that led to the current state of the Lands Between.',
                'content' => "The Shattering was a cataclysmic war that occurred after the Elden Ring was shattered by Queen Marika. Her demigod children fought over the Great Runes, fragments of the Elden Ring. This war devastated the Lands Between and corrupted many of the demigods. The Tarnished are called back to restore the Elden Ring.",
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Top 10 Spirit Ashes and How to Use Them',
                'excerpt' => 'Spirit Ashes can turn the tide of battle. Here are the best ones.',
                'content' => "1. Mimic Tear - Copies your character\n2. Black Knife Tiche - High damage and mobility\n3. Lhutel the Headless - Tanky and teleports\n4. Banished Knight Oleg - Aggressive melee fighter\n5. Cleanrot Knight Finlay - Balanced offense and defense\n6. Ancestral Follower - Ranged support\n7. Redmane Knight Ogha - Great bow attacks\n8. Kristoff - Solid tank\n9. Latenna the Albinauric - Stationary archer\n10. Dung Eater Puppet - Powerful debuffer",
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Weapon Tier List: Patch 1.10 Edition',
                'excerpt' => 'Comprehensive ranking of all weapon types in the current patch.',
                'content' => "S-Tier: Rivers of Blood, Blasphemous Blade, Moonveil\nA-Tier: Bloodhound's Fang, Dark Moon Greatsword, Bolt of Gransax\nB-Tier: Grafted Blade Greatsword, Sword of Night and Flame, Eleonora's Poleblade\nC-Tier: Golden Halberd, Godslayer's Greatsword\n\nWeapon effectiveness depends on build and playstyle.",
                'is_published' => true,
                'published_at' => now()->subDays(22),
            ],
            [
                'title' => 'Quest Guide: Completing Ranni\'s Questline',
                'excerpt' => 'Step-by-step walkthrough for one of the game\'s most rewarding questlines.',
                'content' => "Ranni's questline is one of the longest in Elden Ring. Start by meeting her at Ranni's Rise in Liurnia. Serve her and receive the Spirit Calling Bell. Progress through Caria Manor, defeat the boss, and continue to Nokron. Find the Fingerslayer Blade, return it to Ranni. Descend through Ainsel River to Lake of Rot. This quest leads to an alternate ending.",
                'is_published' => true,
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => 'Co-op Tips for Helping Other Players',
                'excerpt' => 'Maximize your effectiveness as a cooperator and earn extra runes.',
                'content' => "Being a good cooperator requires preparation. Equip supportive talismans, bring healing incantations, use Furled Finger to place your summon sign near boss fog. Popular co-op spots include Margit, Godrick, Radahn, and Malenia. Level 100-150 sees the most activity. Use appropriate weapons for the area level.",
                'is_published' => true,
                'published_at' => now()->subDays(28),
            ],
            [
                'title' => 'Farming Guide: Best Rune Farming Locations',
                'excerpt' => 'Efficiently gain runes with these optimal farming spots.',
                'content' => "Best rune farming locations:\n1. Mohgwyn Palace - Bird farm (10k+ runes per 30 seconds)\n2. Mohgwyn Palace - Sleeping Albinaurics (30k+ per minute)\n3. Beast Sanctum - Vulgar Militiamen (1k per enemy)\n4. Caelid - Dragonbarrow trolls (1k each)\n\nUse Golden Scarab talisman for 20% bonus runes. Activate Gold-Pickled Fowl Foot for 30% boost.",
                'is_published' => true,
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Incantations vs Sorceries: Which is Better?',
                'excerpt' => 'Comparing the two magic systems and their strengths.',
                'content' => "Incantations require Faith and offer versatility: healing, buffs, lightning, fire, and dragon magic. Great for hybrid builds. Sorceries require Intelligence and focus on raw damage output. Better for pure caster builds. Both are viable endgame. Choose based on your playstyle preference.",
                'is_published' => true,
                'published_at' => now()->subDays(33),
            ],
            [
                'title' => 'Elden Ring Photo Mode: Capturing Epic Moments',
                'excerpt' => 'Tips for taking stunning screenshots in the Lands Between.',
                'content' => "While Elden Ring lacks native photo mode, you can capture great shots using camera controls. Remove UI in settings, use the binoculars for zoom, position your character carefully. Best locations for screenshots: Liurnia lakeside at sunset, Leyndell balconies, Haligtree canopy, Mountaintops vistas.",
                'is_published' => true,
                'published_at' => now()->subDays(35),
            ],
            [
                'title' => 'Community Challenge: Level 1 Run Tips',
                'excerpt' => 'Attempting a level 1 run? Here\'s what you need to know.',
                'content' => "Level 1 runs require perfect execution and knowledge. Start as Wretch for flexibility. Focus on weapon upgrades over levels. Master dodge timing and boss patterns. Use powerful Spirit Ashes. Craft consumables for buffs. Recommended weapons: Club (early), Bloodhound's Fang (mid), any somber weapon at +10 (late).",
                'is_published' => true,
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'New Player Guide: First 10 Hours',
                'excerpt' => 'Essential tips for surviving your initial journey as Tarnished.',
                'content' => "Welcome to Elden Ring! First steps: Pick a starting class that matches your preferred playstyle. Explore Limgrave thoroughly before advancing. Collect Golden Seeds and Sacred Tears. Level Vigor early (aim for 20-30). Don't fight Tree Sentinel immediately. Use Torrent to escape tough situations. Visit merchants and discover Sites of Grace. Experiment with different weapons.",
                'is_published' => true,
                'published_at' => now()->subDays(45),
            ],
        ];

        foreach ($articles as $index => $articleData) {
            $admin = $admins[$index % $admins->count()];
            NewsArticle::create(array_merge($articleData, [
                'slug' => \Illuminate\Support\Str::slug($articleData['title']),
                'user_id' => $admin->id
            ]));
        }
    }
}
