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
        $users = User::all();
        $threads = ForumThread::all();

        $replyContents = [
            'Great point! I totally agree with this perspective.',
            'Thanks for sharing this. Very helpful information!',
            'I had a similar experience. It definitely gets easier with practice.',
            'This worked perfectly for me. Thanks so much!',
            'Disagree on this one. I found a different approach works better.',
            'Can you explain this in more detail? I\'m still confused.',
            'Just tried this and it worked! You\'re a lifesaver.',
            'I struggled with this for hours. Wish I had seen this sooner.',
            'The strategy is solid but requires good timing.',
            'This is exactly what I was looking for. Thank you!',
            'Has anyone else tried this method?',
            'I prefer a different approach but this is valid too.',
            'This guide is really well explained.',
            'Thanks for the detailed breakdown!',
            'I\'m going to try this tonight and report back.',
            'Worked on my third attempt. Much appreciated!',
            'This is now my go-to strategy for this situation.',
            'Brilliant suggestion! Never thought of that.',
            'I was doing it all wrong. This makes so much sense now.',
            'Could you share your exact build for this?',
            'What level would you recommend for attempting this?',
            'The patience required for this is insane but worth it.',
            'Just wanted to say this community is amazing!',
            'Following this advice made things so much easier.',
            'I can confirm this works. Just beat it using this method.',
            'Still struggling but I\'ll keep trying with these tips.',
            'This deserves more upvotes. Super helpful.',
            'Anyone else find the timing really difficult?',
            'Practice makes perfect with this one.',
            'After 50 attempts, finally succeeded with this strategy!',
        ];

        foreach ($threads as $thread) {
            // 70% of threads get replies
            if (rand(1, 100) <= 70) {
                $replyCount = rand(2, 5);
                
                for ($i = 0; $i < $replyCount; $i++) {
                    ForumReply::create([
                        'forum_thread_id' => $thread->id,
                        'user_id' => $users->random()->id,
                        'content' => $replyContents[array_rand($replyContents)],
                        'created_at' => $thread->created_at->addHours(rand(1, 72)),
                    ]);
                }
            }
        }
    }
}
