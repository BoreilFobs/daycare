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
        // Clear existing testimonials
        Testimonial::truncate();
        
        $testimonials = [
            [
                'client_name' => 'Internally Displaced Mother',
                'client_position' => 'Parent',
                'message' => 'When we had nowhere to turn, ABC Centre welcomed us with love. Today, my child is safe and learning well, and I am gradually rebuilding my business.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'client_name' => 'Student Mother',
                'client_position' => 'Parent',
                'message' => 'ABC Centre gave me the chance to continue schooling while my child was cared for with love. Today, I am learning, and my child is growing happily.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'client_name' => 'Working Mother',
                'client_position' => 'Parent of 2-year-old',
                'message' => 'The caregivers at ABC Centre treat my daughter like their own child. The nutrition program has helped her grow strong and healthy. I can work peacefully knowing she is in good hands.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'client_name' => 'Community Leader',
                'client_position' => 'Njingouo Quarter',
                'message' => 'ABC Centre has transformed our community. Children who were once idle are now learning and developing. The parent workshops have empowered many families to better care for their children.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('Testimonials seeded successfully! Created ' . count($testimonials) . ' testimonials.');
    }
}
