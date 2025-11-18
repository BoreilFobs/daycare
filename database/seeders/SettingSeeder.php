<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'ABC Children Centre',
                'type' => 'text',
                'group' => 'general',
                'description' => 'Website name',
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Nurturing Little Minds for a Bright Future',
                'type' => 'text',
                'group' => 'general',
                'description' => 'Website tagline',
            ],
            [
                'key' => 'site_description',
                'value' => 'ABC Children Centre provides exceptional childcare and early education programs for children ages 6 weeks to 12 years.',
                'type' => 'textarea',
                'group' => 'general',
                'description' => 'Website description',
            ],
            
            // Contact Information
            [
                'key' => 'contact_phone',
                'value' => '+237 650 123 456',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'Main phone number',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@abcchildrencentre.com',
                'type' => 'email',
                'group' => 'contact',
                'description' => 'Main email address',
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Main Street, Downtown, Douala, Cameroon',
                'type' => 'textarea',
                'group' => 'contact',
                'description' => 'Physical address',
            ],
            [
                'key' => 'contact_map_url',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741295493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sPT%20Kulkul%20Teknologi%20Internasional!5e0!3m2!1sen!2sid!4v1601138221085!5m2!1sen!2sid',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'Google Maps embed URL',
            ],
            [
                'key' => 'business_hours',
                'value' => "Monday - Friday: 7:00 AM - 6:00 PM\nSaturday: 8:00 AM - 4:00 PM\nSunday: Closed",
                'type' => 'textarea',
                'group' => 'contact',
                'description' => 'Business hours',
            ],
            
            // Social Media
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/abcchildrencentre',
                'type' => 'text',
                'group' => 'social',
                'description' => 'Facebook page URL',
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/abcchildrencare',
                'type' => 'text',
                'group' => 'social',
                'description' => 'Twitter profile URL',
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/abcchildrencentre',
                'type' => 'text',
                'group' => 'social',
                'description' => 'Instagram profile URL',
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/abc-children-centre',
                'type' => 'text',
                'group' => 'social',
                'description' => 'LinkedIn company URL',
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/c/abcchildrencentre',
                'type' => 'text',
                'group' => 'social',
                'description' => 'YouTube channel URL',
            ],
            
            // Appearance
            [
                'key' => 'primary_color',
                'value' => '#ff4880',
                'type' => 'color',
                'group' => 'appearance',
                'description' => 'Primary brand color',
            ],
            [
                'key' => 'secondary_color',
                'value' => '#4d65f9',
                'type' => 'color',
                'group' => 'appearance',
                'description' => 'Secondary brand color',
            ],
            
            // SEO
            [
                'key' => 'meta_title',
                'value' => 'ABC Children Centre - Quality Childcare & Early Education',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'Default meta title',
            ],
            [
                'key' => 'meta_description',
                'value' => 'ABC Children Centre provides exceptional childcare and early education programs for children ages 6 weeks to 12 years in a safe, nurturing environment.',
                'type' => 'textarea',
                'group' => 'seo',
                'description' => 'Default meta description',
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'daycare, childcare, early education, preschool, after school care, infant care, toddler care',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'SEO keywords',
            ],
            
            // Email
            [
                'key' => 'admin_email',
                'value' => 'admin@abcchildrencentre.com',
                'type' => 'email',
                'group' => 'email',
                'description' => 'Administrator email',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('Settings seeded successfully! Created ' . count($settings) . ' settings.');
    }
}
