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
        // Clear existing services
        Service::truncate();

        $services = [
            [
                'title' => 'Child Day Care',
                'description' => 'Active supervision and a good balance of play, learning, and rest. We provide a warm and nurturing environment for children aged 3 months to 5 years.',
                'full_description' => 'Our child day care service provides active supervision and a good balance of play, learning, and rest. We create a warm and nurturing environment especially for children aged 3 months to 5 years. Our trained female staff with up to 6 years of experience ensures every child feels safe, loved, and engaged throughout the day. We follow a gentle, no-punishment approach, guiding children with patience, respect, and love.',
                'icon' => 'fas fa-baby',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Early Learning',
                'description' => 'We build early literacy and numeracy skills through play, songs, games, storytelling, and problem-solving, creating a strong base for lifelong learning.',
                'full_description' => 'Our early learning program builds foundational literacy and numeracy skills through play, songs, games, storytelling, and problem-solving activities. We believe in helping children develop skills at their own pace through step-by-step guidance. Our approach creates a strong base for lifelong learning, preparing children for success in school and beyond.',
                'icon' => 'fas fa-book-reader',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Nutrition & Health',
                'description' => 'We offer healthy meals and clean drinking water for all children, collaborating with health authorities for vaccination, vitamin A supplementation, and deworming.',
                'full_description' => 'We offer healthy meals and clean drinking water for all children. We collaborate with parents and health authorities to ensure children benefit from essential health services including vaccination, vitamin A supplementation, and deworming. Sick children are referred to approved health facilities and only return when fully fit.',
                'icon' => 'fas fa-heartbeat',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Parent Support',
                'description' => 'We build parents skills on child nutrition, health, development, and positive parenting through mini workshops and seminars.',
                'full_description' => 'Our parent support program builds parents skills on child nutrition, health, development, and positive parenting through mini workshops and seminars. We believe in strong collaboration with parents and our community for lasting impact.',
                'icon' => 'fas fa-hands-helping',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Birthday Celebrations',
                'description' => 'Monthly celebrations that help children feel loved and valued. We create special moments for every child.',
                'full_description' => 'Our monthly birthday celebrations help children feel loved and valued. We create joyful moments where children can celebrate their special day with friends and caregivers.',
                'icon' => 'fas fa-birthday-cake',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Special Events',
                'description' => 'Joyful annual events like our Christmas Party with songs, games, dances, and gifts shared with families and community.',
                'full_description' => 'Our special events, including our annual Christmas Party, create joyful shared moments with families and our community. These events feature songs, games, dances, and gifts.',
                'icon' => 'fas fa-gift',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services seeded successfully! Created ' . count($services) . ' services.');
    }
}
