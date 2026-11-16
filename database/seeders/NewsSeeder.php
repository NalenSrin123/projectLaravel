<?php

namespace Database\Seeders;

use App\Models\news;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            ['title' => 'Welcome to Our Store', 'description' => 'Discover a curated selection of everyday products at great prices.'],
            ['title' => 'New Arrivals This Week', 'description' => 'Explore the newest additions across our popular product categories.'],
            ['title' => 'Shopping Tips', 'description' => 'Find the right product by comparing sizes, colours, and available stock.'],
        ];

        foreach ($articles as $article) {
            news::updateOrCreate(['title' => $article['title']], $article + ['image' => '']);
        }
    }
}
