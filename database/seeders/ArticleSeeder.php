<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = Category::all();

        foreach (range(1, 21) as $index) {
            $title = $faker->sentence(6);

            Article::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'status' => 'published',
                'category_id' => $categories->random()->id,
                'content' => $faker->paragraphs(5, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
