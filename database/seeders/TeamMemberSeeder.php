<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $teamMembers = [
            [
                'name' => 'Linda Carlson',
                'position' => 'Director & Lead Educator',
                'bio' => 'With over 15 years of experience in early childhood education, Linda leads our team with passion and expertise. She holds a Master\'s degree in Early Childhood Education and is certified in Montessori teaching methods.',
                'email' => 'linda.carlson@abcchildren.com',
                'phone' => '+237 650 123 456',
                'image' => null,
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Infant Care Specialist',
                'bio' => 'Sarah\'s gentle approach and 10 years of infant care experience make her invaluable to our youngest learners. She specializes in creating nurturing environments where babies thrive and develop secure attachments.',
                'email' => 'sarah.johnson@abcchildren.com',
                'phone' => '+237 650 234 567',
                'image' => null,
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => null,
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Emily Roberts',
                'position' => 'Preschool Teacher',
                'bio' => 'Emily brings creativity and enthusiasm to our preschool classroom. With a background in child psychology and 8 years of teaching experience, she creates engaging learning experiences that prepare children for kindergarten.',
                'email' => 'emily.roberts@abcchildren.com',
                'phone' => '+237 650 345 678',
                'image' => null,
                'facebook_url' => null,
                'twitter_url' => 'https://twitter.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::create($member);
        }

        $this->command->info('Team members seeded successfully! Created ' . count($teamMembers) . ' team members.');
    }
}
