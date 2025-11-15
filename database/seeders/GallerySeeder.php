<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $galleries = [
            // Classroom Activities
            [
                'title' => 'Morning Circle Time',
                'description' => 'Our preschoolers gather for morning circle time, singing songs and sharing stories to start the day.',
                'image' => 'gallery/circle-time.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Arts & Crafts',
                'description' => 'Children exploring their creativity through painting, drawing, and various craft activities.',
                'image' => 'gallery/arts-crafts.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Reading Corner',
                'description' => 'A cozy space where children develop their love for books and stories.',
                'image' => 'gallery/reading-corner.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Science Exploration',
                'description' => 'Hands-on science activities that spark curiosity and discovery.',
                'image' => 'gallery/science.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Building Blocks',
                'description' => 'Developing spatial awareness and problem-solving skills through block play.',
                'image' => 'gallery/blocks.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Music Time',
                'description' => 'Learning rhythm, melody, and movement through music and dance.',
                'image' => 'gallery/music-time.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'title' => 'Dramatic Play Area',
                'description' => 'Role-playing and imagination come alive in our dramatic play center.',
                'image' => 'gallery/dramatic-play.jpg',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 7,
            ],

            // Outdoor Play
            [
                'title' => 'Playground Fun',
                'description' => 'Children developing gross motor skills on our age-appropriate playground equipment.',
                'image' => 'gallery/playground.jpg',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 8,
            ],
            [
                'title' => 'Garden Exploration',
                'description' => 'Learning about plants and nature in our vegetable garden.',
                'image' => 'gallery/garden.jpg',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 9,
            ],
            [
                'title' => 'Water Play',
                'description' => 'Sensory experiences and summer fun with our water play activities.',
                'image' => 'gallery/water-play.jpg',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 10,
            ],
            [
                'title' => 'Sandbox Adventures',
                'description' => 'Creative play and sensory exploration in our sandbox area.',
                'image' => 'gallery/sandbox.jpg',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 11,
            ],
            [
                'title' => 'Bike Path',
                'description' => 'Children practicing coordination on our outdoor bike path.',
                'image' => 'gallery/bikes.jpg',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 12,
            ],
            [
                'title' => 'Nature Walk',
                'description' => 'Exploring the outdoors and learning about our environment.',
                'image' => 'gallery/nature-walk.jpg',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 13,
            ],

            // Special Events
            [
                'title' => 'Holiday Celebration',
                'description' => 'Festive fun during our annual holiday party with families.',
                'image' => 'gallery/holiday-party.jpg',
                'category' => 'Special Events',
                'is_active' => true,
                'order' => 14,
            ],
            [
                'title' => 'Graduation Day',
                'description' => 'Celebrating our preschool graduates as they prepare for kindergarten.',
                'image' => 'gallery/graduation.jpg',
                'category' => 'Special Events',
                'is_active' => true,
                'order' => 15,
            ],
            [
                'title' => 'Fall Festival',
                'description' => 'Autumn fun with pumpkin decorating and harvest activities.',
                'image' => 'gallery/fall-festival.jpg',
                'category' => 'Special Events',
                'is_active' => true,
                'order' => 16,
            ],
            [
                'title' => 'Art Show',
                'description' => 'Showcasing the amazing artwork created by our talented young artists.',
                'image' => 'gallery/art-show.jpg',
                'category' => 'Special Events',
                'is_active' => true,
                'order' => 17,
            ],
            [
                'title' => 'Field Trip',
                'description' => 'Exciting adventures and learning experiences outside the classroom.',
                'image' => 'gallery/field-trip.jpg',
                'category' => 'Special Events',
                'is_active' => true,
                'order' => 18,
            ],
            [
                'title' => 'Parent\'s Day',
                'description' => 'Welcoming families to participate in classroom activities.',
                'image' => 'gallery/parents-day.jpg',
                'category' => 'Special Events',
                'is_active' => true,
                'order' => 19,
            ],

            // Meals & Nutrition
            [
                'title' => 'Healthy Snack Time',
                'description' => 'Nutritious snacks served throughout the day to keep energy levels up.',
                'image' => 'gallery/snack-time.jpg',
                'category' => 'Meals & Nutrition',
                'is_active' => true,
                'order' => 20,
            ],
            [
                'title' => 'Lunch Together',
                'description' => 'Children enjoying healthy, balanced meals in our dining area.',
                'image' => 'gallery/lunch.jpg',
                'category' => 'Meals & Nutrition',
                'is_active' => true,
                'order' => 21,
            ],
            [
                'title' => 'Cooking Activity',
                'description' => 'Hands-on cooking experiences teach math, science, and nutrition.',
                'image' => 'gallery/cooking.jpg',
                'category' => 'Meals & Nutrition',
                'is_active' => true,
                'order' => 22,
            ],

            // Facilities
            [
                'title' => 'Infant Room',
                'description' => 'Our calm, nurturing environment designed specifically for our youngest learners.',
                'image' => 'gallery/infant-room.jpg',
                'category' => 'Facilities',
                'is_active' => true,
                'order' => 23,
            ],
            [
                'title' => 'Toddler Classroom',
                'description' => 'Age-appropriate learning spaces for active toddlers to explore.',
                'image' => 'gallery/toddler-room.jpg',
                'category' => 'Facilities',
                'is_active' => true,
                'order' => 24,
            ],
            [
                'title' => 'Preschool Room',
                'description' => 'Bright, engaging classrooms that inspire learning and creativity.',
                'image' => 'gallery/preschool-room.jpg',
                'category' => 'Facilities',
                'is_active' => true,
                'order' => 25,
            ],
            [
                'title' => 'Nap Area',
                'description' => 'Quiet, comfortable spaces for rest time with individual cots.',
                'image' => 'gallery/nap-area.jpg',
                'category' => 'Facilities',
                'is_active' => true,
                'order' => 26,
            ],
            [
                'title' => 'Library Corner',
                'description' => 'Our cozy library filled with age-appropriate books and comfortable seating.',
                'image' => 'gallery/library.jpg',
                'category' => 'Facilities',
                'is_active' => true,
                'order' => 27,
            ],

            // Learning & Development
            [
                'title' => 'Math Manipulatives',
                'description' => 'Hands-on materials that make learning numbers and counting fun.',
                'image' => 'gallery/math.jpg',
                'category' => 'Learning & Development',
                'is_active' => true,
                'order' => 28,
            ],
            [
                'title' => 'Sensory Play',
                'description' => 'Exploring textures, materials, and sensations through sensory activities.',
                'image' => 'gallery/sensory.jpg',
                'category' => 'Learning & Development',
                'is_active' => true,
                'order' => 29,
            ],
            [
                'title' => 'Fine Motor Skills',
                'description' => 'Activities that develop hand-eye coordination and small muscle control.',
                'image' => 'gallery/fine-motor.jpg',
                'category' => 'Learning & Development',
                'is_active' => true,
                'order' => 30,
            ],
            [
                'title' => 'Group Activities',
                'description' => 'Collaborative learning experiences that build social skills.',
                'image' => 'gallery/group-activity.jpg',
                'category' => 'Learning & Development',
                'is_active' => true,
                'order' => 31,
            ],
            [
                'title' => 'STEM Learning',
                'description' => 'Early introduction to science, technology, engineering, and math concepts.',
                'image' => 'gallery/stem.jpg',
                'category' => 'Learning & Development',
                'is_active' => true,
                'order' => 32,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }

        $this->command->info('Gallery images seeded successfully! Created ' . count($galleries) . ' gallery items.');
    }
}
