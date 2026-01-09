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
            // Getting Started
            ['category' => 'Getting Started', 'question' => 'What is Elden Ring?', 'answer' => 'Elden Ring is an action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment. It features an expansive open world called the Lands Between, where players explore, fight enemies, and uncover the mysteries of the shattered Elden Ring.', 'order' => 1],
            ['category' => 'Getting Started', 'question' => 'Which starting class should I choose?', 'answer' => 'The best starting class depends on your playstyle. Vagabond is great for melee combat, Astrologer for magic users, and Wretch starts at level 1 with no equipment, offering maximum flexibility for custom builds. Remember, your starting class mainly affects early game stats and equipment.', 'order' => 2],
            ['category' => 'Getting Started', 'question' => 'How do I level up?', 'answer' => 'You can level up by resting at Sites of Grace and spending Runes. Early in the game, you need to visit the Roundtable Hold and speak with Melina to unlock this feature. Each level increases your attributes and makes your character stronger.', 'order' => 3],

            // Gameplay Mechanics
            ['category' => 'Gameplay Mechanics', 'question' => 'What are Flask Tears?', 'answer' => 'Flask Tears (Golden Seeds and Sacred Tears) are items used to upgrade your healing flasks. Golden Seeds increase the number of flask charges, while Sacred Tears increase the amount of HP/FP restored per use. They can be found throughout the Lands Between.', 'order' => 1],
            ['category' => 'Gameplay Mechanics', 'question' => 'How does weapon scaling work?', 'answer' => 'Weapons have scaling grades (E, D, C, B, A, S) for different attributes (Strength, Dexterity, Intelligence, Faith, Arcane). The better the grade, the more bonus damage you get from that attribute. You can change scaling by applying Ashes of War.', 'order' => 2],
            ['category' => 'Gameplay Mechanics', 'question' => 'What is Stance Breaking?', 'answer' => 'Stance Breaking, also called Posture Breaking or Staggering, occurs when you deal enough posture damage to an enemy. This opens them up for a critical hit. Heavy attacks, charged attacks, and jump attacks deal more posture damage.', 'order' => 3],

            // Character Builds
            ['category' => 'Character Builds', 'question' => 'What is a quality build?', 'answer' => 'A quality build focuses on leveling both Strength and Dexterity equally, typically to 40-50 each. This allows you to use a wide variety of weapons effectively. It is versatile but may not specialize as much as pure STR or DEX builds.', 'order' => 1],
            ['category' => 'Character Builds', 'question' => 'When should I stop leveling Vigor?', 'answer' => 'Most players aim for 40 Vigor as a baseline for endgame content, with 60 being the soft cap. Going beyond 60 gives diminishing returns. Never neglect Vigor - it is crucial for survival in the Lands Between.', 'order' => 2],
            ['category' => 'Character Builds', 'question' => 'Can I respec my character?', 'answer' => 'Yes! After defeating Rennala, Queen of the Full Moon at the Academy of Raya Lucaria, you can respec your character using a Larval Tear. Larval Tears are rare items found throughout the game.', 'order' => 3],

            // Boss Strategies
            ['category' => 'Boss Strategies', 'question' => 'How do I beat Margit the Fell Omen?', 'answer' => 'Margit is tough for new players. Use Margit\'s Shackle (bought from Patches) to bind him during phase 1. Learn his delayed attack timings, summon Rogier for help, and consider leveling up to 25-30 before attempting. Roll into his attacks rather than away.', 'order' => 1],
            ['category' => 'Boss Strategies', 'question' => 'What level should I be for Radahn?', 'answer' => 'Recommended level for Starscourge Radahn is 60-70. Make sure to summon all available NPCs during the fight - they provide excellent distraction. Focus on horseback combat and watch for his gravity arrows.', 'order' => 2],
            ['category' => 'Boss Strategies', 'question' => 'How do I avoid Malenia\'s Waterfowl Dance?', 'answer' => 'When Malenia rises into the air, immediately run away from her first flurry, then roll through or away from the second and third flurries. Alternatively, use a shield with Barricade Shield ash of war, or stagger her before she can execute the move.', 'order' => 3],
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
