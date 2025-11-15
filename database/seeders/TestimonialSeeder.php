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
            // Featured Testimonials
            [
                'client_name' => 'Jennifer Williams',
                'client_position' => 'Parent of Emma, Age 4',
                'message' => 'ABC Children Centre has been an absolute blessing for our family! Emma has blossomed socially and academically since starting here. The teachers are incredibly caring and professional, and they truly understand early childhood development. We couldn\'t be happier!',
                'rating' => 5,
                'client_image' => 'testimonials/jennifer-williams.jpg',
                'is_active' => true,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'client_name' => 'Michael Thompson',
                'client_position' => 'Parent of Lucas & Olivia, Ages 2 & 5',
                'message' => 'As a parent of two children at ABC, I can confidently say this is the best daycare in the area. The staff goes above and beyond to create a nurturing environment. My kids actually get excited to go to school every morning! The communication with parents is excellent too.',
                'rating' => 5,
                'client_image' => 'testimonials/michael-thompson.jpg',
                'is_active' => true,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'client_name' => 'Sarah Chen',
                'client_position' => 'Parent of Noah, Age 3',
                'message' => 'The transition to daycare was smooth thanks to the wonderful teachers at ABC Children Centre. They took the time to understand Noah\'s needs and made him feel comfortable from day one. I love the daily updates and seeing photos of him learning and playing!',
                'rating' => 5,
                'client_image' => 'testimonials/sarah-chen.jpg',
                'is_active' => true,
                'is_featured' => true,
                'order' => 3,
            ],
            
            // Active Testimonials
            [
                'client_name' => 'David Martinez',
                'client_position' => 'Parent of Sofia, Age 4',
                'message' => 'We absolutely love ABC Children Centre! Sofia has learned so much and made wonderful friends. The curriculum is well-balanced with academic learning and plenty of play. The facilities are clean and safe, and the staff is always friendly and helpful.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 4,
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_position' => 'Parent of Ethan, Age 2',
                'message' => 'As a first-time mom, I was nervous about daycare, but ABC exceeded all my expectations. The infant care program is exceptional. The teachers are patient, loving, and experienced. I feel completely at ease leaving Ethan in their care.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'client_name' => 'James Wilson',
                'client_position' => 'Parent of Ava, Age 5',
                'message' => 'The preschool program at ABC prepared Ava perfectly for kindergarten. She learned her letters, numbers, and so much more. But what impressed me most was the focus on social-emotional development. She\'s confident, kind, and ready for the next step!',
                'rating' => 5,
                'client_image' => 'testimonials/james-wilson.jpg',
                'is_active' => true,
                'is_featured' => false,
                'order' => 6,
            ],
            [
                'client_name' => 'Lisa Anderson',
                'client_position' => 'Parent of Mason, Age 3',
                'message' => 'The teachers at ABC are amazing! They really take the time to get to know each child and tailor activities to their interests. Mason loves the outdoor play area and all the fun learning activities. We\'re so grateful to have found this center.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 7,
            ],
            [
                'client_name' => 'Robert Garcia',
                'client_position' => 'Parent of Isabella, Age 4',
                'message' => 'ABC Children Centre feels like an extension of our family. The care and attention Isabella receives is outstanding. We love the parent-teacher conferences and the open communication. It\'s wonderful to be so involved in her education.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 8,
            ],
            [
                'client_name' => 'Amanda Taylor',
                'client_position' => 'Parent of Jackson, Age 2',
                'message' => 'The meals provided are healthy and delicious - Jackson always tells me what he ate for lunch! The facilities are spotless, and I appreciate the safety measures in place. The whole team is professional and genuinely cares about the children.',
                'rating' => 5,
                'client_image' => 'testimonials/amanda-taylor.jpg',
                'is_active' => true,
                'is_featured' => false,
                'order' => 9,
            ],
            [
                'client_name' => 'Christopher Lee',
                'client_position' => 'Parent of Mia, Age 5',
                'message' => 'We\'ve tried other daycares, but ABC is in a league of its own. The educational approach is excellent, and Mia has thrived here. The teachers are knowledgeable and passionate about what they do. Highly recommend!',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 10,
            ],
            [
                'client_name' => 'Michelle Brown',
                'client_position' => 'Parent of Liam, Age 3',
                'message' => 'The after-school program is fantastic! Liam gets help with homework and has time for fun activities and socializing. The staff is great about keeping us informed about his day. It\'s the perfect solution for our family.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 11,
            ],
            [
                'client_name' => 'Daniel Harris',
                'client_position' => 'Parent of Charlotte, Age 4',
                'message' => 'Charlotte has special needs, and the team at ABC has been incredibly supportive and accommodating. They work with us to ensure she gets the individualized attention she needs while being included with her peers. Truly exceptional care!',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 12,
            ],
            [
                'client_name' => 'Jessica Moore',
                'client_position' => 'Parent of Benjamin, Age 2',
                'message' => 'ABC has exceeded our expectations in every way. Benjamin is learning new things every day, and the progress reports help us stay connected. The teachers are warm and nurturing - it\'s clear they love what they do!',
                'rating' => 5,
                'client_image' => 'testimonials/jessica-moore.jpg',
                'is_active' => true,
                'is_featured' => false,
                'order' => 13,
            ],
            [
                'client_name' => 'Steven White',
                'client_position' => 'Parent of Amelia, Age 5',
                'message' => 'The preschool graduation ceremony was so touching! It was wonderful to see how much Amelia had grown and learned during her time at ABC. She\'s more than ready for kindergarten thanks to the excellent preparation she received here.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 14,
            ],
            [
                'client_name' => 'Karen Johnson',
                'client_position' => 'Parent of Alexander, Age 3',
                'message' => 'We moved from another city and were worried about finding quality childcare. ABC was recommended by a friend, and we\'re so glad we listened! Alexander settled in quickly, and we feel like we\'re part of a community here.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 15,
            ],
            [
                'client_name' => 'Brian Davis',
                'client_position' => 'Parent of Harper, Age 4',
                'message' => 'The art and music programs are wonderful! Harper comes home singing songs and excited to show us her artwork. The well-rounded curriculum really sets ABC apart from other centers we looked at.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 16,
            ],
            [
                'client_name' => 'Patricia Miller',
                'client_position' => 'Parent of Ella & James, Ages 3 & 5',
                'message' => 'Having both our children at ABC makes life so much easier! The family events are wonderful for bringing everyone together. We appreciate the sibling discount and the flexibility with scheduling.',
                'rating' => 5,
                'client_image' => 'testimonials/patricia-miller.jpg',
                'is_active' => true,
                'is_featured' => false,
                'order' => 17,
            ],
            [
                'client_name' => 'Thomas Wilson',
                'client_position' => 'Parent of Grace, Age 2',
                'message' => 'The infant room is absolutely perfect. It\'s calm, clean, and the teachers are so attentive. We get daily reports about Grace\'s activities, meals, and naps. The peace of mind this gives us is priceless!',
                'rating' => 5,
                'client_image' => null,
                'is_active' => true,
                'is_featured' => false,
                'order' => 18,
            ],

            // Inactive (for testing)
            [
                'client_name' => 'Rebecca Martinez',
                'client_position' => 'Parent of Daniel, Age 4',
                'message' => 'Just wanted to share how happy we are with ABC! Daniel talks about his teachers and friends all the time. The curriculum is engaging and age-appropriate. We feel very fortunate to have found such a great center.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => false,
                'is_featured' => false,
                'order' => 19,
            ],
            [
                'client_name' => 'Andrew Clark',
                'client_position' => 'Parent of Sophia, Age 3',
                'message' => 'The outdoor play area is amazing! Sophia loves exploring the garden and playing on the equipment. It\'s great that they get outdoor time every day, rain or shine. The whole facility is very impressive.',
                'rating' => 5,
                'client_image' => null,
                'is_active' => false,
                'is_featured' => false,
                'order' => 20,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('Testimonials seeded successfully! Created ' . count($testimonials) . ' testimonials.');
    }
}
