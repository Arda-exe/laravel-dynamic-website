<?php

namespace Database\Seeders;

use App\Models\ForumThread;
use App\Models\ForumCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class ForumThreadSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();
        $users = User::where('email', '!=', 'admin@ehb.be')->take(3)->get();

        $generalDiscussion = ForumCategory::where('slug', 'general-discussion')->first();
        $bossStrategies = ForumCategory::where('slug', 'boss-strategies')->first();
        $buildDiscussions = ForumCategory::where('slug', 'build-discussions')->first();
        $loreTheories = ForumCategory::where('slug', 'lore-theories')->first();

        // General Discussion Threads
        ForumThread::create([
            'forum_category_id' => $generalDiscussion->id,
            'user_id' => $users[0]->id ?? $admin->id,
            'title' => 'What Was Your "Oh, This Game Hates Me" Moment?',
            'content' => "What was the exact moment Elden Ring made you realize it wasn't messing around?\n\nFor me, it was walking straight up to the Tree Sentinel right after the tutorial because I assumed that's what you're supposed to do. Got absolutely deleted in seconds and learned my first lesson: just because you can fight something doesn't mean you should.\n\nWas it a boss, an area you wandered into way too early, or some random enemy that humbled you out of nowhere? Bonus points if you kept retrying instead of leaving like a sensible Tarnished.",
            'is_pinned' => false,
        ]);

        ForumThread::create([
            'forum_category_id' => $generalDiscussion->id,
            'user_id' => $users[1]->id ?? $admin->id,
            'title' => 'What\'s Your Favorite Area in the Game (and Which One Do You Hate)?',
            'content' => "Every playthrough, there's at least one area I'm excited to reach and one I'm dreading.\n\nI love Limgrave for the vibes and freedom, but Caelid still stresses me out every single time. Doesn't matter how geared I am — that place feels cursed.\n\nWhat's your favorite region and why? And be honest: which area do you sprint through just to get it over with?",
            'is_pinned' => false,
        ]);

        // Boss Strategies Threads
        ForumThread::create([
            'forum_category_id' => $bossStrategies->id,
            'user_id' => $users[2]->id ?? $admin->id,
            'title' => 'Be Honest — How Did You Actually Beat Malenia?',
            'content' => "Alright, I'm officially stuck on Malenia and starting to question my build, my reflexes, and my life choices.\n\nHow did you beat her for real? Not \"just dodge better,\" but actual strategies that worked for you.\nDid you respec? Abuse bleed? Use Mimic Tear? Summon help and feel zero shame?\n\nAny tips for dealing with Waterfowl Dance without instantly dying would be appreciated. I'm open to anything at this point.",
            'is_pinned' => true,
        ]);

        ForumThread::create([
            'forum_category_id' => $bossStrategies->id,
            'user_id' => $admin->id,
            'title' => 'New Players Keep Bouncing Off Margit — What\'s Your Advice?',
            'content' => "I keep seeing new players get hard-stuck on Margit and assume the game just isn't for them.\n\nWhat would you tell someone struggling here? Should they explore more first, grab specific gear, or lean heavily on summons? Any ashes of war or spirit ashes that make this fight way easier?\n\nDrop your best beginner-friendly tips so future Tarnished don't uninstall at Stormveil.",
            'is_pinned' => false,
        ]);

        // Build Discussions Threads
        ForumThread::create([
            'forum_category_id' => $buildDiscussions->id,
            'user_id' => $users[0]->id ?? $admin->id,
            'title' => 'Are Pure Strength Builds Actually Good or Am I Coping?',
            'content' => "With all the crazy stuff in Elden Ring — bleed, magic, hybrids, ashes of war — I'm wondering how pure Strength builds really stack up.\n\nDo colossal weapons still feel worth it late game, or do they just get you killed faster? Is going STR/FAI or STR/INT basically mandatory now?\n\nIf you're running a Strength build that actually works, please share what you're using before I respec out of spite.",
            'is_pinned' => false,
        ]);

        ForumThread::create([
            'forum_category_id' => $buildDiscussions->id,
            'user_id' => $users[1]->id ?? $admin->id,
            'title' => 'What\'s the Most Fun Build You\'ve Played (Not Necessarily the Best)?',
            'content' => "Forget the meta for a second — what's the build you had the most fun with?\n\nCould be off-meta, thematic, or just dumb but effective. How did it perform in PvE and PvP? Did it fall apart late game or surprise you by staying viable?\n\nLooking for ideas for a new run and would love to steal something cool.",
            'is_pinned' => false,
        ]);

        // Lore & Theories Threads
        ForumThread::create([
            'forum_category_id' => $loreTheories->id,
            'user_id' => $users[2]->id ?? $admin->id,
            'title' => 'What Does the Greater Will Actually Want?',
            'content' => "We hear about the Greater Will constantly, but it's still weirdly vague about what it actually wants from the Lands Between.\n\nIs it genuinely about order and stability, or is it just another outer god using the world for its own ends? How do the different endings change (or reinforce) its influence?\n\nWould love to hear theories backed by item descriptions, dialogue, or environmental storytelling.",
            'is_pinned' => false,
        ]);

        ForumThread::create([
            'forum_category_id' => $loreTheories->id,
            'user_id' => $admin->id,
            'title' => 'So… What\'s the Deal With Marika and Radagon?',
            'content' => "The game straight-up tells us Marika and Radagon are the same being, but their actions feel completely at odds with each other.\n\nAre they two sides of the same god? Did Radagon exist separately at first? Or is this some kind of divine coping mechanism gone wrong?\n\nCurious how everyone else interprets this, especially if you've dug deep into item descriptions or ending details.",
            'is_pinned' => false,
        ]);
    }
}
