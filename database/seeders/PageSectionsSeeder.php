<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageSection;
use Illuminate\Support\Facades\DB;

class PageSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_sections')->truncate();

        $sections = [
            // HOME PAGE SECTIONS
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'title',
                'value' => 'We Care Your Baby',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'subtitle',
                'value' => 'The Best Play Area For Your Kids',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'button_1_text',
                'value' => 'Get Started',
                'type' => 'text',
                'order' => 3,
            ],
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'button_1_link',
                'value' => '/contact',
                'type' => 'text',
                'order' => 4,
            ],
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'button_2_text',
                'value' => 'Learn More',
                'type' => 'text',
                'order' => 5,
            ],
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'button_2_link',
                'value' => '/about',
                'type' => 'text',
                'order' => 6,
            ],
            [
                'page' => 'home',
                'section_name' => 'hero',
                'key' => 'video_url',
                'value' => 'https://www.youtube.com/embed/DWRcNpR6Kdc',
                'type' => 'video',
                'order' => 7,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'title',
                'value' => 'About Us',
                'type' => 'text',
                'order' => 8,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'heading',
                'value' => 'We Learn Smart Way To Build Bright Futute For Your Children',
                'type' => 'text',
                'order' => 9,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'description',
                'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
                'type' => 'textarea',
                'order' => 10,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'feature_1',
                'value' => 'Sport Activites',
                'type' => 'text',
                'order' => 11,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'feature_2',
                'value' => 'Outdoor Games',
                'type' => 'text',
                'order' => 12,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'feature_3',
                'value' => 'Nutritious Foods',
                'type' => 'text',
                'order' => 13,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'feature_4',
                'value' => 'Highly Secured',
                'type' => 'text',
                'order' => 14,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'feature_5',
                'value' => 'Friendly Environment',
                'type' => 'text',
                'order' => 15,
            ],
            [
                'page' => 'home',
                'section_name' => 'about',
                'key' => 'feature_6',
                'value' => 'Qualified Teacher',
                'type' => 'text',
                'order' => 16,
            ],
            [
                'page' => 'home',
                'section_name' => 'programs',
                'key' => 'title',
                'value' => 'Our Programs',
                'type' => 'text',
                'order' => 17,
            ],
            [
                'page' => 'home',
                'section_name' => 'programs',
                'key' => 'heading',
                'value' => 'Explore Our Programs',
                'type' => 'text',
                'order' => 18,
            ],
            [
                'page' => 'home',
                'section_name' => 'services',
                'key' => 'title',
                'value' => 'Our Services',
                'type' => 'text',
                'order' => 19,
            ],
            [
                'page' => 'home',
                'section_name' => 'services',
                'key' => 'heading',
                'value' => 'What We Offer For You',
                'type' => 'text',
                'order' => 20,
            ],
            [
                'page' => 'home',
                'section_name' => 'events',
                'key' => 'title',
                'value' => 'Our Events',
                'type' => 'text',
                'order' => 21,
            ],
            [
                'page' => 'home',
                'section_name' => 'events',
                'key' => 'heading',
                'value' => 'Our Upcoming Events',
                'type' => 'text',
                'order' => 22,
            ],
            [
                'page' => 'home',
                'section_name' => 'gallery',
                'key' => 'title',
                'value' => 'Our Gallery',
                'type' => 'text',
                'order' => 23,
            ],
            [
                'page' => 'home',
                'section_name' => 'gallery',
                'key' => 'heading',
                'value' => 'What We Do',
                'type' => 'text',
                'order' => 24,
            ],
            [
                'page' => 'home',
                'section_name' => 'testimonials',
                'key' => 'title',
                'value' => 'Testimonial',
                'type' => 'text',
                'order' => 25,
            ],
            [
                'page' => 'home',
                'section_name' => 'testimonials',
                'key' => 'heading',
                'value' => 'What Parents Say About Us',
                'type' => 'text',
                'order' => 26,
            ],
            [
                'page' => 'home',
                'section_name' => 'blog',
                'key' => 'title',
                'value' => 'Latest News & Blog',
                'type' => 'text',
                'order' => 27,
            ],
            [
                'page' => 'home',
                'section_name' => 'blog',
                'key' => 'heading',
                'value' => 'Read Our Latest News & Blog',
                'type' => 'text',
                'order' => 28,
            ],

            // ABOUT PAGE SECTIONS
            [
                'page' => 'about',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'About Us',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'about',
                'section_name' => 'about',
                'key' => 'title',
                'value' => 'About Us',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'about',
                'section_name' => 'about',
                'key' => 'heading',
                'value' => 'We Learn Smart Way To Build Bright Future For Your Children',
                'type' => 'text',
                'order' => 3,
            ],
            [
                'page' => 'about',
                'section_name' => 'about',
                'key' => 'description',
                'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
                'type' => 'wysiwyg',
                'order' => 4,
            ],

            // PROGRAMS PAGE SECTIONS
            [
                'page' => 'programs',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Our Programs',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'programs',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Our Programs',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'programs',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'What We Provide',
                'type' => 'text',
                'order' => 3,
            ],

            // EVENTS PAGE SECTIONS
            [
                'page' => 'events',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Events',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'events',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Our Events',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'events',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'Our Upcoming Events',
                'type' => 'text',
                'order' => 3,
            ],

            // BLOG PAGE SECTIONS
            [
                'page' => 'blog',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Our Blog',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'blog',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Latest News & Blog',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'blog',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'Read Our Latest News & Blog',
                'type' => 'text',
                'order' => 3,
            ],

            // CONTACT PAGE SECTIONS
            [
                'page' => 'contact',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Contact Us',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'contact',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Contact Us',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'contact',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'Contact For Any Query',
                'type' => 'text',
                'order' => 3,
            ],
            [
                'page' => 'contact',
                'section_name' => 'content',
                'key' => 'description',
                'value' => 'Have questions about our daycare programs? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.',
                'type' => 'textarea',
                'order' => 4,
            ],
            [
                'page' => 'contact',
                'section_name' => 'info',
                'key' => 'address',
                'value' => '104 North tower New York, USA',
                'type' => 'text',
                'order' => 5,
            ],
            [
                'page' => 'contact',
                'section_name' => 'info',
                'key' => 'email',
                'value' => 'info@example.com',
                'type' => 'text',
                'order' => 6,
            ],
            [
                'page' => 'contact',
                'section_name' => 'info',
                'key' => 'phone',
                'value' => '+012 345 67890',
                'type' => 'text',
                'order' => 7,
            ],
            [
                'page' => 'contact',
                'section_name' => 'info',
                'key' => 'map_embed',
                'value' => '',
                'type' => 'textarea',
                'order' => 8,
            ],

            // SERVICES PAGE SECTIONS
            [
                'page' => 'services',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Our Services',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'services',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Our Services',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'services',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'What We Offer For You',
                'type' => 'text',
                'order' => 3,
            ],

            // TEAM PAGE SECTIONS
            [
                'page' => 'team',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Our Team',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'team',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Meet Our Team',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'team',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'Our Expert Teachers',
                'type' => 'text',
                'order' => 3,
            ],

            // TESTIMONIALS PAGE SECTIONS
            [
                'page' => 'testimonials',
                'section_name' => 'header',
                'key' => 'title',
                'value' => 'Testimonials',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'page' => 'testimonials',
                'section_name' => 'content',
                'key' => 'title',
                'value' => 'Testimonial',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'page' => 'testimonials',
                'section_name' => 'content',
                'key' => 'heading',
                'value' => 'What Parents Say About Us',
                'type' => 'text',
                'order' => 3,
            ],
        ];

        foreach ($sections as $section) {
            PageSection::create($section);
        }

        $this->command->info('Page sections seeded successfully!');
    }
}
