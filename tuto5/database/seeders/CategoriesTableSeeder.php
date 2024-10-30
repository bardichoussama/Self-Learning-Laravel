<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
  
    public function run(): void
    {
        DB::transaction(function () {
            Category::factory()->count(10)->create();

            $csv = Reader::createFromPath(database_path('seeders/categories.csv'), 'r');
            $csv->setHeaderOffset(0);

            foreach ($csv as $record) {
                Category::create([
                    'name' => $record['name'],
                ]);
            }
        });
    }
    }

