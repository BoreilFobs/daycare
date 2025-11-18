<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Amara Okafor',
                'client_position' => 'Parent of Chioma, Age 4',
                'message' => 'ABC Children Centre has been an absolute blessing for our family! Chioma has blossomed socially and academically since starting here. The teachers are incredibly caring and professional, and they truly understand early childhood development. We couldn\'t be happier!',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'client_name' => 'Kwame Mensah',
                'client_position' => 'Parent of Ama & Kofi, Ages 2 & 5',
                'message' => 'As a parent of two children at ABC, I can confidently say this is the best daycare in the area. The staff goes above and beyond to create a nurturing environment. My kids actually get excited to go to school every morning! The communication with parents is excellent too.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'client_name' => 'Fatima Diallo',
                'client_position' => 'Parent of Ibrahim, Age 3',
                'message' => 'The transition to daycare was smooth thanks to the wonderful teachers at ABC Children Centre. They took the time to understand Ibrahim\'s needs and made him feel comfortable from day one. I love the daily updates and seeing photos of him learning and playing!',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => true,
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('Testimonials seeded successfully! Created ' . count($testimonials) . ' testimonials.');
    }
}
