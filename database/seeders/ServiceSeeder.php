<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Infant Care',
                'description' => 'Our infant care program provides a nurturing, safe environment for babies aged 6 weeks to 18 months. We focus on building secure attachments, supporting developmental milestones, and creating a home-like atmosphere where your little one can thrive.',
                'icon' => 'fa-baby',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Toddler Programs',
                'description' => 'Our toddler program (18 months to 3 years) encourages exploration, independence, and social-emotional growth. Through play-based learning, language development activities, and structured routines, we help toddlers develop confidence and curiosity.',
                'icon' => 'fa-child',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Preschool Education',
                'description' => 'Our preschool program (3-5 years) prepares children for kindergarten through hands-on learning experiences. We focus on literacy, numeracy, creative expression, and social skills in a fun, engaging environment that nurtures a love for learning.',
                'icon' => 'fa-graduation-cap',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'After School Care',
                'description' => 'Our after school program provides a safe, enriching environment for school-aged children. We offer homework assistance, recreational activities, healthy snacks, and opportunities for creative play and social interaction with peers.',
                'icon' => 'fa-school',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Meal & Nutrition',
                'description' => 'We provide nutritious, well-balanced meals and snacks prepared fresh daily. Our menu accommodates dietary restrictions and allergies, ensuring every child receives healthy, delicious food that supports their growth and development.',
                'icon' => 'fa-utensils',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Learning Activities',
                'description' => 'Our comprehensive curriculum includes age-appropriate activities: arts & crafts, music & movement, outdoor play, STEM activities, literacy games, and more. Each activity is designed to support holistic child development.',
                'icon' => 'fa-palette',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'title' => 'Transportation',
                'description' => 'We offer safe and reliable transportation services for school pick-up and drop-off. Our experienced drivers and well-maintained vehicles ensure your child travels safely to and from our center.',
                'icon' => 'fa-bus',
                'is_active' => true,
                'order' => 7,
            ],
            [
                'title' => 'Parent Partnership',
                'description' => 'We believe in strong parent partnerships. Through regular communication, parent-teacher conferences, family events, and daily updates, we keep you connected to your child\'s progress and create a true community of care.',
                'icon' => 'fa-hands-helping',
                'is_active' => true,
                'order' => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services seeded successfully! Created ' . count($services) . ' services.');
    }
}
