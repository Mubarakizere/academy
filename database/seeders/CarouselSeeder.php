<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::truncate();

        $slides = [
            [
                'badge' => 'Intake 2026 • Kigali & Nairobi',
                'title' => 'Master Eyelash Extensions & Lash Artistry',
                'subtitle' => 'Gain hands-on certification in classic, hybrid, volume lashes and lifting techniques at East Africa\'s premier academy.',
                'image' => 'images/slides/lashes_slide.png',
                'button_text' => 'Explore Lash Program',
                'button_link' => '/courses',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'badge' => 'Professional Certification Track',
                'title' => 'Luxury Pro Makeup & High-Fashion Artistry',
                'subtitle' => 'Elevate your artistry with advanced bridal makeup, skin prep, color matching, and editorial glam training.',
                'image' => 'images/slides/makeup_slide.png',
                'button_text' => 'Explore Makeup Program',
                'button_link' => '/courses',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'badge' => 'Specialized Studio Artistry',
                'title' => 'Fine Line Body & Cosmetic Tattoo',
                'subtitle' => 'Learn machine operation, needle selection, ink physics, and sterile tattoo artistry from industry master trainers.',
                'image' => 'images/slides/tattoo_slide.png',
                'button_text' => 'Explore Tattoo Program',
                'button_link' => '/courses',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'badge' => 'Full Specialist Diploma',
                'title' => 'Advanced Nail Technology & Sculpting',
                'subtitle' => 'Master acrylic overlays, polygel extensions, 3D nail art, encapsulation, and salon management skills.',
                'image' => 'images/slides/nails_slide.png',
                'button_text' => 'Explore Nails Program',
                'button_link' => '/courses',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            Carousel::create($slide);
        }
    }
}
