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
                'image' => 'team/linda-carlson.jpg',
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
                'image' => 'team/sarah-johnson.jpg',
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
                'image' => 'team/emily-roberts.jpg',
                'facebook_url' => null,
                'twitter_url' => 'https://twitter.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Toddler Program Lead',
                'bio' => 'Michael\'s patience and playful teaching style make him a favorite among toddlers and parents alike. His 7 years of experience with this energetic age group shine through in every interaction.',
                'email' => 'michael.chen@abcchildren.com',
                'phone' => '+237 650 456 789',
                'image' => 'team/michael-chen.jpg',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => null,
                'instagram_url' => null,
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Jessica Martinez',
                'position' => 'Music & Movement Instructor',
                'bio' => 'Jessica brings the joy of music and movement to all our classrooms. With a degree in Music Education and 6 years of early childhood experience, she helps children develop rhythm, coordination, and creative expression.',
                'email' => 'jessica.martinez@abcchildren.com',
                'phone' => '+237 650 567 890',
                'image' => 'team/jessica-martinez.jpg',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => null,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'David Thompson',
                'position' => 'After School Program Coordinator',
                'bio' => 'David creates fun, enriching after-school experiences for school-aged children. His background in recreation and 5 years of experience ensure children have a safe, engaging place to learn and play after school.',
                'email' => 'david.thompson@abcchildren.com',
                'phone' => '+237 650 678 901',
                'image' => 'team/david-thompson.jpg',
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'name' => 'Angela Williams',
                'position' => 'Nutrition Specialist',
                'bio' => 'Angela ensures our children receive nutritious, delicious meals every day. Her certification in pediatric nutrition and culinary training help her create menus that children love and parents appreciate.',
                'email' => 'angela.williams@abcchildren.com',
                'phone' => '+237 650 789 012',
                'image' => 'team/angela-williams.jpg',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => null,
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => null,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'name' => 'Rachel Kim',
                'position' => 'Assistant Teacher',
                'bio' => 'Rachel supports our lead teachers with enthusiasm and dedication. Currently completing her Early Childhood Education degree, she brings fresh ideas and genuine care to our classrooms every day.',
                'email' => 'rachel.kim@abcchildren.com',
                'phone' => '+237 650 890 123',
                'image' => 'team/rachel-kim.jpg',
                'facebook_url' => null,
                'twitter_url' => 'https://twitter.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => null,
                'is_active' => true,
                'order' => 8,
            ],
            [
                'name' => 'James Anderson',
                'position' => 'Facilities & Safety Manager',
                'bio' => 'James ensures our center is safe, clean, and well-maintained. His attention to detail and commitment to safety standards give parents peace of mind and create a healthy environment for children.',
                'email' => 'james.anderson@abcchildren.com',
                'phone' => '+237 650 901 234',
                'image' => 'team/james-anderson.jpg',
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => null,
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 9,
            ],
            [
                'name' => 'Maria Garcia',
                'position' => 'Administrative Coordinator',
                'bio' => 'Maria is the friendly face that greets families every day. Her organizational skills and warm demeanor help keep our center running smoothly while making every family feel welcome and valued.',
                'email' => 'maria.garcia@abcchildren.com',
                'phone' => '+237 650 012 345',
                'image' => 'team/maria-garcia.jpg',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => null,
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_active' => true,
                'order' => 10,
            ],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::create($member);
        }

        $this->command->info('Team members seeded successfully! Created ' . count($teamMembers) . ' team members.');
    }
}
