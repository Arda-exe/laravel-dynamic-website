<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // Getting Started (3)
            ['category' => 'Getting Started', 'question' => 'What is Elden Ring?', 'answer' => 'Elden Ring is an action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment. It features an expansive open world called the Lands Between, where players explore, fight enemies, and uncover the mysteries of the shattered Elden Ring.', 'order' => 1],
            ['category' => 'Getting Started', 'question' => 'Which starting class should I choose?', 'answer' => 'The best starting class depends on your playstyle. Vagabond is great for melee combat, Astrologer for magic users, and Wretch starts at level 1 with no equipment, offering maximum flexibility for custom builds. Remember, your starting class mainly affects early game stats and equipment.', 'order' => 2],
            ['category' => 'Getting Started', 'question' => 'How do I level up?', 'answer' => 'You can level up by resting at Sites of Grace and spending Runes. Early in the game, you need to visit the Roundtable Hold and speak with Melina to unlock this feature. Each level increases your attributes and makes your character stronger.', 'order' => 3],

            // Gameplay Mechanics (4)
            ['category' => 'Gameplay Mechanics', 'question' => 'What are Flask Tears?', 'answer' => 'Flask Tears (Golden Seeds and Sacred Tears) are items used to upgrade your healing flasks. Golden Seeds increase the number of flask charges, while Sacred Tears increase the amount of HP/FP restored per use. They can be found throughout the Lands Between.', 'order' => 1],
            ['category' => 'Gameplay Mechanics', 'question' => 'How does weapon scaling work?', 'answer' => 'Weapons have scaling grades (E, D, C, B, A, S) for different attributes (Strength, Dexterity, Intelligence, Faith, Arcane). The better the grade, the more bonus damage you get from that attribute. You can change scaling by applying Ashes of War.', 'order' => 2],
            ['category' => 'Gameplay Mechanics', 'question' => 'What is Stance Breaking?', 'answer' => 'Stance Breaking, also called Posture Breaking or Staggering, occurs when you deal enough posture damage to an enemy. This opens them up for a critical hit. Heavy attacks, charged attacks, and jump attacks deal more posture damage.', 'order' => 3],
            ['category' => 'Gameplay Mechanics', 'question' => 'How do Ashes of War work?', 'answer' => 'Ashes of War are special abilities that can be applied to weapons to change their skills and scaling. You can swap them at Sites of Grace. They also allow you to change weapon affinities (Heavy, Keen, Quality, Magic, etc.) which affects scaling bonuses.', 'order' => 4],

            // Character Builds (4)
            ['category' => 'Character Builds', 'question' => 'What is a quality build?', 'answer' => 'A quality build focuses on leveling both Strength and Dexterity equally, typically to 40-50 each. This allows you to use a wide variety of weapons effectively. It is versatile but may not specialize as much as pure STR or DEX builds.', 'order' => 1],
            ['category' => 'Character Builds', 'question' => 'When should I stop leveling Vigor?', 'answer' => 'Most players aim for 40 Vigor as a baseline for endgame content, with 60 being the soft cap. Going beyond 60 gives diminishing returns. Never neglect Vigor - it is crucial for survival in the Lands Between.', 'order' => 2],
            ['category' => 'Character Builds', 'question' => 'Can I respec my character?', 'answer' => 'Yes! After defeating Rennala, Queen of the Full Moon at the Academy of Raya Lucaria, you can respec your character using a Larval Tear. Larval Tears are rare items found throughout the game.', 'order' => 3],
            ['category' => 'Character Builds', 'question' => 'What are soft caps and hard caps?', 'answer' => 'Soft caps are stat levels where returns begin to diminish. Hard caps are where gains become minimal. For example, Vigor soft caps at 40 and 60. Most damage stats soft cap at 55/80. Mind soft caps at 55/60. Endurance soft caps at 50/60 for stamina.', 'order' => 4],

            // Boss Strategies (4)
            ['category' => 'Boss Strategies', 'question' => 'How do I beat Margit the Fell Omen?', 'answer' => 'Margit is tough for new players. Use Margit\'s Shackle (bought from Patches) to bind him during phase 1. Learn his delayed attack timings, summon Rogier for help, and consider leveling up to 25-30 before attempting. Roll into his attacks rather than away.', 'order' => 1],
            ['category' => 'Boss Strategies', 'question' => 'What level should I be for Radahn?', 'answer' => 'Recommended level for Starscourge Radahn is 60-70. Make sure to summon all available NPCs during the fight - they provide excellent distraction. Focus on horseback combat and watch for his gravity arrows.', 'order' => 2],
            ['category' => 'Boss Strategies', 'question' => 'How do I avoid Malenia\'s Waterfowl Dance?', 'answer' => 'When Malenia rises into the air, immediately run away from her first flurry, then roll through or away from the second and third flurries. Alternatively, use a shield with Barricade Shield ash of war, or stagger her before she can execute the move.', 'order' => 3],
            ['category' => 'Boss Strategies', 'question' => 'Tips for defeating the Fire Giant?', 'answer' => 'Target his ankle in phase 1 to deal maximum damage. In phase 2, switch to attacking his hands and arms. Stay on Torrent for mobility. Bleed builds are particularly effective. Watch out for his AOE fire attacks and rolling attacks.', 'order' => 4],

            // Locations & Exploration (3)
            ['category' => 'Locations & Exploration', 'question' => 'Where can I find Smithing Stones?', 'answer' => 'Smithing Stones are found in mines throughout the Lands Between. Regular Smithing Stones are in Limgrave and Liurnia mines, while Somber Smithing Stones are in various dungeon locations. You can also buy infinite stones by finding Bell Bearings and giving them to the Twin Maiden Husks.', 'order' => 1],
            ['category' => 'Locations & Exploration', 'question' => 'How do I access the Haligtree?', 'answer' => 'To reach Miquella\'s Haligtree, you need both halves of the Haligtree Secret Medallion. One half is in Castle Sol (Mountaintops of the Giants), the other in the Village of the Albinaurics (Liurnia). Use the medallion at the Grand Lift of Rold to access the Consecrated Snowfield, then find the teleporter to the Haligtree.', 'order' => 2],
            ['category' => 'Locations & Exploration', 'question' => 'What are the hidden underground areas?', 'answer' => 'The major underground areas are Siofra River, Ainsel River, and Deeproot Depths (accessed via Siofra), plus Mohgwyn Palace (accessed via Varre\'s quest or a teleporter in the Consecrated Snowfield). Lake of Rot connects to the Moonlight Altar above.', 'order' => 3],

            // Multiplayer & Co-op (3)
            ['category' => 'Multiplayer & Co-op', 'question' => 'How does co-op multiplayer work?', 'answer' => 'Use the Furlcalling Finger Remedy to see summon signs from other players. Place your own sign using the Tarnished\'s Furled Finger to be summoned. Co-op allows up to 3 players total (host + 2 summons). You cannot use Torrent in co-op, and some areas are restricted.', 'order' => 1],
            ['category' => 'Multiplayer & Co-op', 'question' => 'What are the different multiplayer items?', 'answer' => 'Furlcalling Finger Remedy reveals summon signs. Tarnished\'s Furled Finger places co-op sign. Duelist\'s Furled Finger is for PvP. Bloody Finger invades others. Festering Bloody Finger is consumable invasion. Recusant Finger is for covenant invasions. White Cipher Ring calls for help when invaded.', 'order' => 2],
            ['category' => 'Multiplayer & Co-op', 'question' => 'How do passwords work?', 'answer' => 'Multiplayer passwords let you connect with specific friends. Set a password in multiplayer settings - only players with the same password will see your signs. This bypasses level restrictions but applies stat scaling to keep balance. Group passwords let you see messages and bloodstains from group members.', 'order' => 3],
        ];

        foreach ($faqs as $faqData) {
            $category = FaqCategory::where('name', $faqData['category'])->first();
            if ($category) {
                Faq::create([
                    'faq_category_id' => $category->id,
                    'question' => $faqData['question'],
                    'answer' => $faqData['answer'],
                    'order' => $faqData['order'],
                ]);
            }
        }
    }
}
