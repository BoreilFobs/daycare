<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing programs
        Program::truncate();
        
        $programs = [
            [
                'title' => 'Infant Care (3-12 months)',
                'description' => 'Our infant care program provides a nurturing environment for the youngest children. We focus on proper feeding, comfortable rest, gentle stimulation, and lots of loving attention.',
                'full_description' => 'Our infant care program provides a nurturing environment for the youngest children aged 3 to 12 months. We focus on proper feeding, comfortable rest, gentle stimulation, and lots of loving attention. Caregivers work closely with parents to maintain consistent routines. Activities include individual feeding schedules, safe sleep environment with cots, gentle developmental activities, daily communication with parents, and health monitoring.',
                'price' => 5000,
                'currency' => 'FCFA',
                'teacher_name' => 'Infant Care Team',
                'teacher_title' => 'Trained Caregivers',
                'total_sits' => 10,
                'total_lessons' => 5,
                'total_hours' => 45,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Toddler Program (1-2 years)',
                'description' => 'Our toddler program supports the rapid development of children aged 1-2 years through guided play, music, movement, and sensory activities.',
                'full_description' => 'Our toddler program supports the rapid development of children aged 1-2 years. Through guided play, music, movement, and sensory activities, toddlers develop motor skills, language, and social-emotional growth in a safe, stimulating environment. Activities include sensory play, language development through songs and stories, motor skills development, social interaction with peers, and nutritious meals and snacks.',
                'price' => 5000,
                'currency' => 'FCFA',
                'teacher_name' => 'Toddler Team',
                'teacher_title' => 'Early Childhood Educators',
                'total_sits' => 12,
                'total_lessons' => 10,
                'total_hours' => 45,
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Preschool Program (3-5 years)',
                'description' => 'Our preschool program prepares children for school readiness through play, songs, games, storytelling, and problem-solving activities.',
                'full_description' => 'Our preschool program prepares children aged 3-5 years for school readiness. We build early literacy and numeracy skills through play, songs, games, storytelling, and problem-solving activities, creating a strong foundation for lifelong learning. Activities include early literacy and numeracy, creative arts and crafts, physical development, social skills development, and introduction to basic concepts.',
                'price' => 5000,
                'currency' => 'FCFA',
                'teacher_name' => 'Preschool Team',
                'teacher_title' => 'Qualified Teachers',
                'total_sits' => 15,
                'total_lessons' => 15,
                'total_hours' => 45,
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Parent Support Workshops',
                'description' => 'We build parents\' skills on child nutrition, health, development and positive parenting through mini workshops and seminars.',
                'full_description' => 'Our parent support program builds parents\' skills on child nutrition, health, development and positive parenting through mini workshops and seminars. These sessions help parents better support their children\'s growth and development at home. Topics include child nutrition guidance, positive parenting techniques, child development milestones, health and hygiene education, and community building.',
                'price' => 0,
                'currency' => 'FCFA',
                'teacher_name' => 'ABC Centre Team',
                'teacher_title' => 'Workshop Facilitators',
                'total_sits' => 50,
                'total_lessons' => 4,
                'total_hours' => 12,
                'is_featured' => false,
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }

        $this->command->info('Programs seeded successfully! Created ' . count($programs) . ' programs.');
    }
}
