<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stat;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stat::truncate();

        $items = [
            [
                'label' => 'Years of Experience',
                'value' => '8+',
                'description' => 'Pioneering professional beauty education in Rwanda & Kenya',
                'icon' => '🏆',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'label' => 'Certified Graduates',
                'value' => '1,500+',
                'description' => 'Graduated lash, makeup, tattoo & nail technicians',
                'icon' => '🎓',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'label' => 'Master Beauty Courses',
                'value' => '4',
                'description' => 'Lashes, Pro Makeup, Tattoo Artistry & Nails',
                'icon' => '💅',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'label' => 'East African Hubs',
                'value' => '2',
                'description' => 'Kigali (Rwanda) & Nairobi (Kenya) Studio Centers',
                'icon' => '🌍',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            Stat::create($item);
        }
    }
}
