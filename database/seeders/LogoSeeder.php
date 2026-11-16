<?php

namespace Database\Seeders;

use App\Models\Logo;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    public function run(): void
    {
        // `thumbnail` is required by the schema; an empty value intentionally means no image.
        Logo::firstOrCreate(['thumbnail' => '']);
    }
}
