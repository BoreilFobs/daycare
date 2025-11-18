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
            [
                'title' => 'Morning Circle Time',
                'description' => 'Our preschoolers gather for morning circle time, singing songs and sharing stories to start the day.',
                'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=800',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Playground Fun',
                'description' => 'Children developing gross motor skills on our age-appropriate playground equipment.',
                'image' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?w=800',
                'category' => 'Outdoor Play',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Arts & Crafts',
                'description' => 'Children exploring their creativity through painting, drawing, and various craft activities.',
                'image' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800',
                'category' => 'Classroom Activities',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }

        $this->command->info('Gallery images seeded successfully! Created ' . count($galleries) . ' gallery items.');
    }
}
