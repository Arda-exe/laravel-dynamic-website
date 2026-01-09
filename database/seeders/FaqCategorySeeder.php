<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

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
                'description' => 'Essential information for new Tarnished beginning their journey',
                'order' => 1,
            ],
            [
                'name' => 'Gameplay Mechanics',
                'description' => 'Learn about the core systems and mechanics of Elden Ring',
                'order' => 2,
            ],
            [
                'name' => 'Character Builds',
                'description' => 'Tips and strategies for creating effective character builds',
                'order' => 3,
            ],
            [
                'name' => 'Boss Strategies',
                'description' => 'Guides and tips for defeating challenging bosses',
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            FaqCategory::create($category);
        }
    }
}
