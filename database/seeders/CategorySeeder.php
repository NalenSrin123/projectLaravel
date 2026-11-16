<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Men', 'Women', 'Unisex'] as $name) {
            Category::updateOrCreate(['name' => $name]);
        }
    }
}
