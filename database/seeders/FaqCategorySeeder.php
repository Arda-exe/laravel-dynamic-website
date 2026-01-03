<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Getting Started',
                'slug' => 'getting-started',
                'description' => 'Essential information for new Tarnished beginning their journey',
                'order' => 1,
            ],
            [
                'name' => 'Gameplay Mechanics',
                'slug' => 'gameplay-mechanics',
                'description' => 'Learn about the core systems and mechanics of Elden Ring',
                'order' => 2,
            ],
            [
                'name' => 'Character Builds',
                'slug' => 'character-builds',
                'description' => 'Tips and strategies for creating effective character builds',
                'order' => 3,
            ],
            [
                'name' => 'Boss Strategies',
                'slug' => 'boss-strategies',
                'description' => 'Guides and tips for defeating challenging bosses',
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            FaqCategory::create($category);
        }
    }
}
