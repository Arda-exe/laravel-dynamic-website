<?php

namespace Database\Seeders;

use App\Models\ForumReply;
use App\Models\ForumThread;
use App\Models\User;
use Illuminate\Database\Seeder;

class ForumReplySeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();
        $users = User::where('email', '!=', 'admin@ehb.be')->get();

        // Get threads
        $treeThread = ForumThread::where('title', 'like', '%Oh, This Game Hates Me%')->first();
        $maleniaThread = ForumThread::where('title', 'like', '%Beat Malenia%')->first();
        $margitThread = ForumThread::where('title', 'like', '%Margit%')->first();
        $strengthThread = ForumThread::where('title', 'like', '%Pure Strength%')->first();

        // Replies for "Oh, This Game Hates Me" thread
        if ($treeThread) {
            ForumReply::create([
                'forum_thread_id' => $treeThread->id,
                'user_id' => $users[1]->id ?? $admin->id,
                'content' => "Same here! I saw the golden guy on a horse and thought \"that's clearly the first boss.\" Nope. Got one-shot and immediately learned to explore first.\n\nAlso tried fighting those giant crabs in Liurnia way too early. Those things hit HARD.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $treeThread->id,
                'user_id' => $users[2]->id ?? $admin->id,
                'content' => "For me it was wandering into Caelid at level 20. Everything was red, the sky looked cursed, and then I got chased by a giant crow. Immediately noped out of there.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $treeThread->id,
                'user_id' => $admin->id,
                'content' => "The Grafted Scion at the very beginning got me. I thought I could beat it in the tutorial and spent an hour trying before realizing you're supposed to die there. Classic Souls moment.",
            ]);
        }

        // Replies for Malenia thread
        if ($maleniaThread) {
            ForumReply::create([
                'forum_thread_id' => $maleniaThread->id,
                'user_id' => $admin->id,
                'content' => "Mimic Tear +10 with a bleed build is what finally did it for me. Dual-wielding Uchigatanas with Seppuku. Still took about 30 tries.\n\nFor Waterfowl Dance, I used Bloodhound Step to dodge it. Made the fight way more manageable.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $maleniaThread->id,
                'user_id' => $users[0]->id ?? $admin->id,
                'content' => "I respecced to pure INT and used Comet Azur + the physick that gives you unlimited FP. Melted her in phase 1, then had to actually fight phase 2 properly.\n\nAlso, freezing pots help a TON. They interrupt her during Waterfowl if you time it right.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $maleniaThread->id,
                'user_id' => $users[1]->id ?? $admin->id,
                'content' => "Not gonna lie, I summoned two cooperators and we just stunlocked her with jump attacks. No shame. That fight is brutal solo.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $maleniaThread->id,
                'user_id' => $users[2]->id ?? $admin->id,
                'content' => "Rivers of Blood katana with Mimic Tear. The bleed damage is insane and you can proc it multiple times per phase. Just be aggressive and don't give her space to heal.\n\nIf you see Waterfowl Dance starting, sprint away immediately, then dodge roll into the second and third flurries.",
            ]);
        }

        // Replies for Margit thread
        if ($margitThread) {
            ForumReply::create([
                'forum_thread_id' => $margitThread->id,
                'user_id' => $users[0]->id ?? $admin->id,
                'content' => "Get the jellyfish spirit summon from Roderika at Stormhill Shack. It tanks hits and poisons him.\n\nAlso, explore Limgrave and the Weeping Peninsula first. You can easily hit level 30-35 before Margit and the fight becomes much easier.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $margitThread->id,
                'user_id' => $users[1]->id ?? $admin->id,
                'content' => "Use Margit's Shackle! You can buy it from Patches in Murkwater Cave. It stuns him twice during the fight and gives you free hits.\n\nAlso don't be greedy. Hit him 1-2 times max after dodging, then back off.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $margitThread->id,
                'user_id' => $admin->id,
                'content' => "Honestly, summoning Rogier outside the boss room helps a lot. He distracts Margit while you attack from behind.\n\nAnd upgrade your weapon! A +3 or +4 weapon makes a huge difference this early.",
            ]);
        }

        // Replies for Strength build thread
        if ($strengthThread) {
            ForumReply::create([
                'forum_thread_id' => $strengthThread->id,
                'user_id' => $users[1]->id ?? $admin->id,
                'content' => "Pure STR is still viable! I beat the game with the Giant Crusher (biggest bonk in the game). Yeah, it's slow, but the jump attack damage with the right talismans is absolutely disgusting.\n\nClaw Talisman + Raptor's Black Feathers + jump attacks = everything gets pancaked.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $strengthThread->id,
                'user_id' => $admin->id,
                'content' => "Going STR/FAI gives you access to buffs which helps a ton. Flame Grant Me Strength + Golden Vow makes you hit like a truck.\n\nBut pure STR with Lion's Claw ash of war is perfectly fine. Hyperarmor through everything and stagger bosses easily.",
            ]);

            ForumReply::create([
                'forum_thread_id' => $strengthThread->id,
                'user_id' => $users[2]->id ?? $admin->id,
                'content' => "Colossal weapons are great for PvE because of the stagger. Most bosses get stance-broken in 3-4 heavy jump attacks.\n\nPvP is harder though. You really need to learn to dead-angle and catch rolls. Crouch poke with the Great Stars is surprisingly good.",
            ]);
        }
    }
}
