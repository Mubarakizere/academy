<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::updateOrCreate(
            ['slug' => 'lashes-artistry'],
            [
                'name' => 'Lashes Artistry Masterclass',
                'description' => 'Classic, Hybrid, Volume & Mega Volume extensions, mapping, lash lifts & brow lamination.',
                'price_rwf' => 350000,
                'price_kes' => 35000,
                'price_usd' => 350,
                'duration' => '4 Weeks',
                'is_active' => true,
            ]
        );

        Course::updateOrCreate(
            ['slug' => 'pro-makeup'],
            [
                'name' => 'Pro Makeup Artistry Masterclass',
                'description' => 'Bridal glam, red carpet makeup, skin prep & color matching for African skin tones.',
                'price_rwf' => 450000,
                'price_kes' => 45000,
                'price_usd' => 450,
                'duration' => '6 Weeks',
                'is_active' => true,
            ]
        );
    }
}
