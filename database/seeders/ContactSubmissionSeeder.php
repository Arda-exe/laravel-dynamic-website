<?php

namespace Database\Seeders;

use App\Models\ContactSubmission;
use Illuminate\Database\Seeder;

class ContactSubmissionSeeder extends Seeder
{
    public function run(): void
    {
        $submissions = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'subject' => 'Bug Report: Unable to Access Forum',
                'message' => 'Hello, I\'ve been trying to access the forum section but keep getting an error message. I\'ve tried clearing my cache and using different browsers, but the issue persists. Could you please help me resolve this? Thank you!',
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@example.com',
                'subject' => 'Suggestion: Add Build Calculator',
                'message' => 'I love this website! It would be amazing if you could add a build calculator tool where users can plan their stat distributions and see the effects on their character. This would be incredibly helpful for the community. Keep up the great work!',
                'created_at' => now()->subDays(5),
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'mchen@example.com',
                'subject' => 'Partnership Opportunity',
                'message' => 'Hi there, I run a gaming YouTube channel focused on Elden Ring content. I\'d love to discuss a potential partnership or collaboration with your website. Please let me know if you\'re interested in exploring this further. Looking forward to hearing from you!',
                'created_at' => now()->subWeek(),
            ],
        ];

        foreach ($submissions as $submission) {
            ContactSubmission::create($submission);
        }
    }
}
