<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSee extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $csvPath = database_path('seeds/categories.csv');
        if (file_exists($csvPath)) {
            $csv = Reader::createFromPath($csvPath, 'r');
            $csv->setHeaderOffset(0);

            foreach ($csv as $record) {
                Category::create([
                    'name' => $record['name'],
                    'description' => $record['description'],
                ]);
            }
        }

        $categories = [
            ['name' => 'Technologie'],
            ['name' => 'Sport'],
            ['name' => 'Cuisine'],
        ];
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        $posts = [
            ['title' => 'Mon premier post', 'body' => 'Contenu du premier post', 'category_id' => 1],

        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
