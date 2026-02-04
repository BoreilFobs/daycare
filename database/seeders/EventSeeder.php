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
                'title' => 'Monthly Birthday Celebrations',
                'description' => 'Join us for our monthly birthday celebration! We honor all children with birthdays this month with songs, games, and special treats. These celebrations help children feel loved and valued.',
                'full_description' => '<p>Our monthly birthday celebrations are a cherished tradition at ABC Children Centre Foumbot. Every month, we come together to celebrate all the children who have birthdays.</p>
                <p><strong>What to expect:</strong></p>
                <ul>
                    <li>Birthday songs and dances</li>
                    <li>Fun games and activities</li>
                    <li>Special birthday treats</li>
                    <li>Photo opportunities</li>
                    <li>Small gifts for birthday children</li>
                </ul>
                <p>Parents are welcome to join us for this joyful celebration!</p>',
                'image' => null,
                'event_date' => Carbon::now()->addDays(15)->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '16:00:00',
                'location' => 'ABC Children Centre, Njingouo Quarter, Foumbot',
                'max_attendees' => 50,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Christmas Party & Family Celebration',
                'description' => 'Our annual Christmas party brings together children, families, and the community for a joyful celebration with songs, games, dances, and gifts. A highlight of our year!',
                'full_description' => '<p>ABC Children Centre\'s Christmas Party is a joyful annual event that brings our entire community together.</p>
                <p><strong>Event Program:</strong></p>
                <ul>
                    <li>Christmas songs and carols by the children</li>
                    <li>Traditional dances and performances</li>
                    <li>Fun games for children and families</li>
                    <li>Gift distribution for all children</li>
                    <li>Festive refreshments</li>
                    <li>Community fellowship</li>
                </ul>
                <p>This is a wonderful opportunity for families to celebrate together and strengthen community bonds.</p>',
                'image' => null,
                'event_date' => Carbon::now()->year . '-12-20',
                'start_time' => '10:00:00',
                'end_time' => '14:00:00',
                'location' => 'ABC Children Centre, Njingouo Quarter, Foumbot',
                'max_attendees' => 150,
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Parent Workshop: Child Nutrition',
                'description' => 'A practical workshop for parents on child nutrition, healthy feeding practices, and preparing nutritious meals on a budget. Learn how to support your child\'s growth and development.',
                'full_description' => '<p>Join us for an informative workshop designed to help parents provide optimal nutrition for their children.</p>
                <p><strong>Topics Covered:</strong></p>
                <ul>
                    <li>Understanding child nutritional needs by age</li>
                    <li>Preparing balanced meals on a budget</li>
                    <li>Local nutritious food options</li>
                    <li>Dealing with picky eaters</li>
                    <li>Healthy snack ideas</li>
                    <li>Importance of clean water and hygiene</li>
                </ul>
                <p>Refreshments will be provided. All parents and caregivers are welcome!</p>',
                'image' => null,
                'event_date' => Carbon::now()->addDays(30)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'location' => 'ABC Children Centre, Njingouo Quarter, Foumbot',
                'max_attendees' => 50,
                'is_featured' => false,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Parent Workshop: Positive Parenting',
                'description' => 'Learn positive parenting techniques that support your child\'s development without punishment. Discover gentle guidance methods that build trust and cooperation.',
                'full_description' => '<p>This workshop helps parents develop positive parenting skills aligned with our center\'s approach.</p>
                <p><strong>What You\'ll Learn:</strong></p>
                <ul>
                    <li>Understanding child development stages</li>
                    <li>Effective communication with young children</li>
                    <li>Alternatives to punishment</li>
                    <li>Setting healthy boundaries with love</li>
                    <li>Building your child\'s confidence</li>
                    <li>Managing tantrums and difficult behaviors</li>
                </ul>
                <p>At ABC Centre, we believe in guiding children with patience, respect, and love - and we want to share these techniques with parents!</p>',
                'image' => null,
                'event_date' => Carbon::now()->addDays(45)->format('Y-m-d'),
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'location' => 'ABC Children Centre, Njingouo Quarter, Foumbot',
                'max_attendees' => 50,
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Community Health Day',
                'description' => 'In partnership with local health authorities, we\'re hosting a health day for children. Services include vaccination, vitamin A supplementation, deworming, and health checkups.',
                'full_description' => '<p>ABC Children Centre collaborates with health authorities to ensure all children benefit from essential health services.</p>
                <p><strong>Services Available:</strong></p>
                <ul>
                    <li>Routine vaccinations</li>
                    <li>Vitamin A supplementation</li>
                    <li>Deworming medication</li>
                    <li>Growth monitoring</li>
                    <li>Basic health checkups</li>
                    <li>Health education for parents</li>
                </ul>
                <p>This event is free and open to all children in our community, not just enrolled families.</p>',
                'image' => null,
                'event_date' => Carbon::now()->addDays(60)->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '13:00:00',
                'location' => 'ABC Children Centre, Njingouo Quarter, Foumbot',
                'max_attendees' => 200,
                'is_featured' => true,
                'is_active' => true,
                'order' => 5,
            ],

            // Past Events
            [
                'title' => 'Fall Harvest Festival',
                'description' => 'We celebrated the harvest season with pumpkin decorating, apple cider tasting, hayrides, and fall-themed games. Families enjoyed a wonderful autumn afternoon together.',
                'full_description' => '<p>Our Fall Harvest Festival was a huge success! Thank you to all the families who joined us for this special celebration.</p>
                <p>Event highlights included pumpkin decorating, fall crafts, hayrides, apple cider tasting, and a costume parade. The children had a wonderful time celebrating the autumn season with their friends and families.</p>',
                'image' => null,
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
                'image' => null,
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
                'image' => null,
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
