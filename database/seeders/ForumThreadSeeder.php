<?php

namespace Database\Seeders;

use App\Models\ForumThread;
use App\Models\ForumCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ForumThreadSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $admins = User::where('role', 'admin')->get();
        
        $categories = ForumCategory::all();

        $threadsByCategory = [
            'general-discussion' => [
                ['title' => 'What Was Your "Oh, This Game Hates Me" Moment?', 'content' => 'Share your first reality check in Elden Ring. For me, it was the Tree Sentinel right out of the gate.', 'pinned' => false],
                ['title' => 'Favorite Area in the Game and Which One Do You Hate?', 'content' => 'Limgrave is beautiful, Caelid is cursed. What about you?', 'pinned' => false],
                ['title' => 'How Many Hours Did Your First Playthrough Take?', 'content' => 'I just hit 120 hours and still discovering new areas. Anyone else?', 'pinned' => false],
                ['title' => 'Best NPC Questlines in Elden Ring', 'content' => 'Ranni\'s quest was amazing but Alexander\'s story hit different. Thoughts?', 'pinned' => false],
                ['title' => 'Torrent Appreciation Thread', 'content' => 'Can we talk about how essential our horse companion is? Best mount in any game.', 'pinned' => false],
                ['title' => 'What Level Are You Stopping At?', 'content' => 'Trying to figure out the PvP meta level. Is 150 still the sweet spot?', 'pinned' => false],
                ['title' => 'Elden Ring vs Other FromSoft Games', 'content' => 'How does it compare to Dark Souls or Bloodborne for you?', 'pinned' => false],
                ['title' => 'Most Unexpected Death Compilation', 'content' => 'Share your dumbest deaths. Mine was rolling off a cliff while fighting a rat.', 'pinned' => false],
                ['title' => 'Tips for New Players Starting Out', 'content' => 'What do you wish you knew when you started?', 'pinned' => true],
                ['title' => 'Elden Ring Soundtrack Appreciation', 'content' => 'The boss music in this game is phenomenal. Favorite tracks?', 'pinned' => false],
                ['title' => 'How Do You Deal With Invasion Anxiety?', 'content' => 'Getting invaded stresses me out. Any tips for handling PvP better?', 'pinned' => false],
                ['title' => 'Found a Secret Area After 200 Hours', 'content' => 'Just discovered Mohgwyn Palace. How did I miss this?!', 'pinned' => false],
                ['title' => 'Best Weapons for Fashion Souls', 'content' => 'What weapons look the coolest? Stats be damned.', 'pinned' => false],
                ['title' => 'Challenge Run Ideas', 'content' => 'Looking for fun challenge runs. Already done level 1. What else?', 'pinned' => false],
                ['title' => 'Favorite Boss Intro Cutscene', 'content' => 'Radahn riding in on that tiny horse will never not be funny.', 'pinned' => false],
            ],
            'boss-strategies' => [
                ['title' => 'Be Honest — How Did You Beat Malenia?', 'content' => 'Stuck on Malenia. Real strategies only please. Did you use Mimic Tear?', 'pinned' => true],
                ['title' => 'Margit Tips for New Players', 'content' => 'Beginner-friendly strategies for the first major roadblock.', 'pinned' => false],
                ['title' => 'Radahn Strategy Without Horse', 'content' => 'Is it even possible to beat him on foot effectively?', 'pinned' => false],
                ['title' => 'Fire Giant Cheese Methods', 'content' => 'This boss is tedious. Anyone know good strategies?', 'pinned' => false],
                ['title' => 'Godskin Duo Solo Guide', 'content' => 'Trying to beat them without summons. Send help.', 'pinned' => false],
                ['title' => 'Mohg Lord of Blood Bleed Resistance', 'content' => 'How do you deal with his blood attacks?', 'pinned' => false],
                ['title' => 'Maliketh Phase 2 Timing Help', 'content' => 'His attacks are so fast! When do I punish?', 'pinned' => false],
                ['title' => 'Elden Beast Final Boss Tips', 'content' => 'Running simulator 2022. How do you catch this thing?', 'pinned' => false],
                ['title' => 'Rykard Easy Mode Strategy', 'content' => 'Serpent-Hunter makes this fight trivial but still fun.', 'pinned' => false],
                ['title' => 'Dragonlord Placidusax Location', 'content' => 'Where exactly do I find this hidden boss?', 'pinned' => false],
                ['title' => 'Astel Naturalborn of the Void Tips', 'content' => 'These grab attacks are insane. Dodging help?', 'pinned' => false],
                ['title' => 'Commander Niall Summons Counter', 'content' => 'The dual sword summon keeps destroying me.', 'pinned' => false],
                ['title' => 'Loretta Knight of the Haligtree', 'content' => 'Magic build strategies for this fight?', 'pinned' => false],
            ],
            'build-discussions' => [
                ['title' => 'Are Pure Strength Builds Actually Good?', 'content' => 'Debating whether to stick with STR or go quality build.', 'pinned' => false],
                ['title' => 'Most Fun Build You\'ve Played', 'content' => 'Not the best, but the most enjoyable build.', 'pinned' => false],
                ['title' => 'Best Bleed Build Post-Nerf', 'content' => 'Rivers of Blood got nerfed. What\'s still viable?', 'pinned' => false],
                ['title' => 'Pure Caster Viability Discussion', 'content' => 'Can you beat the game as a pure INT build?', 'pinned' => false],
                ['title' => 'Arcane Build Guide 2024', 'content' => 'Comprehensive arcane build with weapon recommendations.', 'pinned' => true],
                ['title' => 'Faith/Strength Paladin Build', 'content' => 'Best incantations and weapons for a holy warrior.', 'pinned' => false],
                ['title' => 'Dual Wielding Pros and Cons', 'content' => 'Power stance builds vs shield builds discussion.', 'pinned' => false],
                ['title' => 'Best Starting Class for Beginners', 'content' => 'Which class gives the easiest early game?', 'pinned' => false],
                ['title' => 'Endgame Stat Distribution', 'content' => 'Where should my stats be at level 150?', 'pinned' => false],
                ['title' => 'Dragon Communion Build', 'content' => 'Using all the dragon incantations. Is it worth it?', 'pinned' => false],
                ['title' => 'Sorcery Spell Tier List', 'content' => 'Ranking all sorceries from best to worst.', 'pinned' => false],
                ['title' => 'Best Weapons for Quality Build', 'content' => 'STR/DEX equal investment weapon recommendations.', 'pinned' => false],
                ['title' => 'Sleep Build Experimentation', 'content' => 'Has anyone made a sleep status effect build work?', 'pinned' => false],
                ['title' => 'Perfumer Build Discussion', 'content' => 'Using perfume items as main damage source.', 'pinned' => false],
            ],
            'lore-theories' => [
                ['title' => 'Marika and Radagon Same Person Theory', 'content' => 'Evidence that they were always one being.', 'pinned' => false],
                ['title' => 'What Happened to Godwyn', 'content' => 'The Prince of Death lore deep dive.', 'pinned' => false],
                ['title' => 'Miquella\'s Plan Explained', 'content' => 'Was the Haligtree actually meant to save the world?', 'pinned' => false],
                ['title' => 'The Greater Will vs Outer Gods', 'content' => 'Understanding the cosmic forces at play.', 'pinned' => true],
                ['title' => 'Why Did the Shattering Happen', 'content' => 'What was Marika\'s true motivation?', 'pinned' => false],
                ['title' => 'Ranni\'s Age of Stars Ending Analysis', 'content' => 'What does her ending actually mean for the world?', 'pinned' => false],
                ['title' => 'Connection to Dark Souls Lore', 'content' => 'Easter eggs and potential shared universe theories.', 'pinned' => false],
                ['title' => 'Who is the Gloam-Eyed Queen', 'content' => 'Theories about this mysterious figure.', 'pinned' => false],
                ['title' => 'Melina Identity Theory', 'content' => 'Is she really connected to Marika?', 'pinned' => false],
                ['title' => 'Outer God of Rot Origin', 'content' => 'Malenia and the Scarlet Rot explained.', 'pinned' => false],
                ['title' => 'Farum Azula Time Loop Theory', 'content' => 'Is this area outside of time itself?', 'pinned' => false],
                ['title' => 'Numen People Origins', 'content' => 'Where did Marika\'s people come from?', 'pinned' => false],
            ],
        ];

        foreach ($categories as $category) {
            $threads = $threadsByCategory[$category->slug] ?? [];
            $threadCount = rand(10, 25);
            
            // Add more generic threads if needed
            while (count($threads) < $threadCount) {
                $threads[] = [
                    'title' => 'Discussion about ' . $category->name . ' #' . (count($threads) + 1),
                    'content' => 'General discussion thread for ' . $category->name,
                    'pinned' => false
                ];
            }

            foreach (array_slice($threads, 0, $threadCount) as $threadData) {
                $user = $users->random();
                if ($threadData['pinned'] ?? false) {
                    $user = $admins->random();
                }

                ForumThread::create([
                    'forum_category_id' => $category->id,
                    'user_id' => $user->id,
                    'title' => $threadData['title'],
                    'slug' => Str::slug($threadData['title']),
                    'content' => $threadData['content'],
                    'is_pinned' => $threadData['pinned'] ?? false,
                    'created_at' => now()->subDays(rand(1, 60)),
                ]);
            }
        }
    }
}
