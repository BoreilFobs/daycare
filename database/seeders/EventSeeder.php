<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $events = [
            // Upcoming Events
            [
                'title' => 'Winter Holiday Celebration',
                'description' => 'Join us for our annual Winter Holiday Celebration! Children will enjoy festive activities, holiday crafts, cookie decorating, and a special visit from Santa. Families are welcome to attend this joyful celebration of the season.',
                'full_description' => '<p>Our Winter Holiday Celebration is a cherished tradition at ABC Children Centre. This year\'s event will feature:</p>
                <ul>
                    <li>Holiday crafts and decorations</li>
                    <li>Cookie decorating station</li>
                    <li>Hot cocoa and treats</li>
                    <li>Special visit from Santa Claus</li>
                    <li>Holiday songs and performances by our children</li>
                    <li>Photo opportunities with festive backdrops</li>
                </ul>
                <p>This is a wonderful opportunity for families to come together and celebrate the season. We look forward to seeing you there!</p>',
                'image' => 'events/winter-celebration.jpg',
                'event_date' => Carbon::now()->addDays(20)->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'location' => 'ABC Children Centre Main Hall, 123 Main Street, Yaoundé, Cameroon',
                'max_attendees' => 150,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Parent-Teacher Conference',
                'description' => 'Schedule your one-on-one meeting with your child\'s teacher to discuss progress, milestones, and development goals. This is a great opportunity to strengthen our partnership in your child\'s education.',
                'full_description' => '<p>Our Parent-Teacher Conferences provide dedicated time for meaningful conversations about your child\'s development and learning journey.</p>
                <p><strong>What to Expect:</strong></p>
                <ul>
                    <li>Review of your child\'s progress and achievements</li>
                    <li>Discussion of social-emotional development</li>
                    <li>Learning goals for the upcoming months</li>
                    <li>Opportunity to ask questions and share concerns</li>
                    <li>Resources and strategies for supporting learning at home</li>
                </ul>
                <p>Conferences are scheduled in 20-minute time slots. Please sign up for your preferred time at the front desk.</p>',
                'image' => 'events/parent-teacher.jpg',
                'event_date' => Carbon::now()->addDays(35)->format('Y-m-d'),
                'start_time' => '16:00:00',
                'end_time' => '19:00:00',
                'location' => 'Individual Classrooms, ABC Children Centre',
                'max_attendees' => 100,
                'is_featured' => false,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Spring Field Trip to Botanical Garden',
                'description' => 'Preschoolers will explore the Botanical Garden to learn about plants, flowers, and nature. This hands-on outdoor learning experience includes a guided tour and nature scavenger hunt.',
                'full_description' => '<p>Join us for an exciting outdoor learning adventure at the Botanical Garden!</p>
                <p><strong>Trip Details:</strong></p>
                <ul>
                    <li>Guided tour of the garden</li>
                    <li>Nature scavenger hunt</li>
                    <li>Plant identification activity</li>
                    <li>Picnic lunch in the garden</li>
                    <li>Photo opportunities</li>
                </ul>
                <p><strong>What to Bring:</strong></p>
                <ul>
                    <li>Sun hat and sunscreen</li>
                    <li>Water bottle</li>
                    <li>Comfortable walking shoes</li>
                    <li>Light jacket (weather dependent)</li>
                </ul>
                <p>Transportation will be provided. Parent volunteers are welcome!</p>',
                'image' => 'events/field-trip.jpg',
                'event_date' => Carbon::now()->addDays(50)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '14:00:00',
                'location' => 'Yaoundé Botanical Garden',
                'max_attendees' => 60,
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Fundraiser Gala Night',
                'description' => 'Join us for an elegant evening to support our scholarship program. Enjoy dinner, live music, silent auction, and networking with other families who share our commitment to quality early childhood education.',
                'full_description' => '<p>Our annual Fundraiser Gala is our biggest event of the year, supporting scholarships for families in need.</p>
                <p><strong>Evening Program:</strong></p>
                <ul>
                    <li>Cocktail reception (6:00 PM)</li>
                    <li>Welcome remarks and program overview</li>
                    <li>Three-course dinner</li>
                    <li>Live music performance</li>
                    <li>Silent auction featuring local art and experiences</li>
                    <li>Testimonials from scholarship families</li>
                </ul>
                <p><strong>Dress Code:</strong> Semi-formal / Cocktail attire</p>
                <p>Tickets are $75 per person or $140 for couples. All proceeds support our scholarship fund.</p>',
                'image' => 'events/gala.jpg',
                'event_date' => Carbon::now()->addDays(65)->format('Y-m-d'),
                'start_time' => '18:00:00',
                'end_time' => '22:00:00',
                'location' => 'Grand Hotel Yaoundé, Avenue de l\'Indépendance',
                'max_attendees' => 200,
                'price' => 75.00,
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Summer Camp Registration Open',
                'description' => 'Registration is now open for our exciting Summer Camp program! Featuring themed weeks of fun activities, outdoor adventures, creative arts, sports, and STEM projects for ages 3-12.',
                'full_description' => '<p>Get ready for an amazing summer of learning and fun!</p>
                <p><strong>Summer Camp Highlights:</strong></p>
                <ul>
                    <li>Weekly themes (Space Explorers, Ocean Adventures, Art Studio, Sports Week, etc.)</li>
                    <li>Daily outdoor activities and water play</li>
                    <li>Arts & crafts projects</li>
                    <li>STEM activities and experiments</li>
                    <li>Sports and team games</li>
                    <li>Special weekly field trips</li>
                    <li>Nutritious snacks and lunch included</li>
                </ul>
                <p><strong>Session Dates:</strong></p>
                <ul>
                    <li>Session 1: June 15 - June 26</li>
                    <li>Session 2: June 29 - July 10</li>
                    <li>Session 3: July 13 - July 24</li>
                    <li>Session 4: July 27 - August 7</li>
                </ul>
                <p>Early bird discount available until April 30!</p>',
                'image' => 'events/summer-camp.jpg',
                'event_date' => Carbon::now()->addDays(80)->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'location' => 'ABC Children Centre',
                'max_attendees' => 120,
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
            ],

            // Past Events
            [
                'title' => 'Fall Harvest Festival',
                'description' => 'We celebrated the harvest season with pumpkin decorating, apple cider tasting, hayrides, and fall-themed games. Families enjoyed a wonderful autumn afternoon together.',
                'full_description' => '<p>Our Fall Harvest Festival was a huge success! Thank you to all the families who joined us for this special celebration.</p>
                <p>Event highlights included pumpkin decorating, fall crafts, hayrides, apple cider tasting, and a costume parade. The children had a wonderful time celebrating the autumn season with their friends and families.</p>',
                'image' => 'events/harvest-festival.jpg',
                'event_date' => Carbon::now()->subDays(45)->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'location' => 'ABC Children Centre Outdoor Area',
                'max_attendees' => 150,
                'is_featured' => false,
                'is_active' => false,
                'order' => 6,
            ],
            [
                'title' => 'Back to School Night',
                'description' => 'Parents met their child\'s teachers, toured classrooms, learned about curriculum, and connected with other families. A great start to the new school year!',
                'full_description' => '<p>Thank you to all the families who attended our Back to School Night! It was wonderful to see so many parents engaged and excited about the new school year.</p>
                <p>Parents had the opportunity to visit classrooms, meet teachers, review the curriculum, and ask questions about daily routines and expectations.</p>',
                'image' => 'events/back-to-school.jpg',
                'event_date' => Carbon::now()->subDays(90)->format('Y-m-d'),
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
                'location' => 'ABC Children Centre',
                'max_attendees' => 100,
                'is_featured' => false,
                'is_active' => false,
                'order' => 7,
            ],
            [
                'title' => 'Annual Art Show',
                'description' => 'A beautiful evening showcasing the incredible artwork created by our children throughout the year. Families enjoyed viewing paintings, sculptures, and collaborative projects.',
                'full_description' => '<p>Our Annual Art Show was a beautiful celebration of creativity and expression! The gallery-style display featured artwork from all age groups.</p>
                <p>Thank you to our amazing teachers for nurturing the artistic talents of our children, and to all the families who came to celebrate their young artists!</p>',
                'image' => 'events/art-show.jpg',
                'event_date' => Carbon::now()->subDays(120)->format('Y-m-d'),
                'start_time' => '17:00:00',
                'end_time' => '19:00:00',
                'location' => 'ABC Children Centre Main Hall',
                'max_attendees' => 120,
                'is_featured' => false,
                'is_active' => false,
                'order' => 8,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('Events seeded successfully! Created ' . count($events) . ' events.');
    }
}
