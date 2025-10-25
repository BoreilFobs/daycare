<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class AdditionalSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'logo', 'value' => '', 'type' => 'image', 'group' => 'general'],
            ['key' => 'favicon', 'value' => '', 'type' => 'image', 'group' => 'general'],
            ['key' => 'timezone', 'value' => 'UTC', 'type' => 'text', 'group' => 'general'],
            ['key' => 'date_format', 'value' => 'Y-m-d', 'type' => 'text', 'group' => 'general'],
            ['key' => 'currency', 'value' => 'USD', 'type' => 'text', 'group' => 'general'],
            
            // Contact
            ['key' => 'contact_map_url', 'value' => '', 'type' => 'url', 'group' => 'contact'],
            ['key' => 'business_hours', 'value' => "Monday - Friday: 7:00 AM - 6:00 PM\nSaturday: 8:00 AM - 4:00 PM\nSunday: Closed", 'type' => 'textarea', 'group' => 'contact'],
            
            // Social
            ['key' => 'social_youtube', 'value' => '', 'type' => 'url', 'group' => 'social'],
            
            // Appearance
            ['key' => 'primary_color', 'value' => '#ff4880', 'type' => 'color', 'group' => 'appearance'],
            ['key' => 'secondary_color', 'value' => '#4d65f9', 'type' => 'color', 'group' => 'appearance'],
            ['key' => 'accent_color', 'value' => '#ffc107', 'type' => 'color', 'group' => 'appearance'],
            ['key' => 'header_style', 'value' => 'default', 'type' => 'text', 'group' => 'appearance'],
            ['key' => 'footer_layout', 'value' => 'default', 'type' => 'text', 'group' => 'appearance'],
            
            // SEO
            ['key' => 'meta_title', 'value' => '', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'meta_description', 'value' => '', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'meta_keywords', 'value' => '', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'google_analytics', 'value' => '', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'google_verification', 'value' => '', 'type' => 'text', 'group' => 'seo'],
            
            // Email
            ['key' => 'admin_email', 'value' => '', 'type' => 'email', 'group' => 'email'],
            ['key' => 'smtp_host', 'value' => '', 'type' => 'text', 'group' => 'email'],
            ['key' => 'smtp_port', 'value' => '587', 'type' => 'text', 'group' => 'email'],
            ['key' => 'smtp_username', 'value' => '', 'type' => 'text', 'group' => 'email'],
            ['key' => 'smtp_password', 'value' => '', 'type' => 'password', 'group' => 'email'],
            ['key' => 'smtp_encryption', 'value' => 'tls', 'type' => 'text', 'group' => 'email'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('Additional settings seeded successfully!');
    }
}
