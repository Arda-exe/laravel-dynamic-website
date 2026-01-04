<?php

namespace Database\Seeders;

use App\Models\ForumCategory;
use Illuminate\Database\Seeder;

class ForumCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'General Discussion',
                'slug' => 'general-discussion',
                'description' => 'Talk about anything related to Elden Ring and the Lands Between',
                'order' => 1,
            ],
            [
                'name' => 'Boss Strategies',
                'slug' => 'boss-strategies',
                'description' => 'Share tips, strategies, and seek help for defeating bosses',
                'order' => 2,
            ],
            [
                'name' => 'Build Discussions',
                'slug' => 'build-discussions',
                'description' => 'Discuss character builds, weapons, armor, and stat distributions',
                'order' => 3,
            ],
            [
                'name' => 'Lore & Theories',
                'slug' => 'lore-theories',
                'description' => 'Dive deep into the lore, share theories, and discuss the story',
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            ForumCategory::create($category);
        }
    }
}
