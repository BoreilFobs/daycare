<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin user only if it doesn't exist
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::factory()->create([
                'name' => 'ADMIN',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'), // Ensure to hash the password
                'role' => 'admin', // Set role to admin
            ]);
        }

        // Seed page sections with default content
        $this->call([
            PageSectionsSeeder::class,
        ]);
    }
}
