# Settings Management Guide

## Overview
The Settings system allows administrators to easily manage variable information like contact details, social media links, and location information through a simple and intuitive interface in the admin dashboard.

## Features
- **Simple Interface**: Easy-to-use tabbed interface for managing different categories of settings
- **Real-time Updates**: Changes are immediately visible on the frontend without requiring cache clearing
- **Multiple Categories**: Organized into 6 main categories for easy navigation
- **Flexible Types**: Supports text, textarea, email, color picker, and image uploads

## Accessing Settings
1. Log in to the admin dashboard at `/admin`
2. Navigate to **Settings** > **Site Settings** from the sidebar menu
3. Select the tab corresponding to the settings you want to modify

## Available Settings Tabs

### 1. General
- Site Name
- Site Tagline
- Site Description
- Logo Upload
- Favicon Upload
- Timezone
- Date Format
- Currency

### 2. Contact Info ⭐
This is where you manage the contact information displayed across your website.

**Available Settings:**
- **Phone Number**: Main contact phone (displayed in header, footer, and contact page)
- **Email Address**: Main contact email (displayed in header, footer, and contact page)
- **Physical Address**: Complete address (displayed in footer and contact page)
- **Google Maps URL**: Embed URL for the location map on contact page
- **Business Hours**: Operating hours displayed in the footer

**Usage Example:**
```
Phone: +237 650 123 456
Email: info@abcchildrencentre.com
Address: 123 Main Street, Downtown, Douala, Cameroon
```

### 3. Social Media ⭐
Manage all your social media profile links.

**Available Settings:**
- Facebook Page URL
- Twitter Profile URL
- Instagram Profile URL
- LinkedIn Company URL
- YouTube Channel URL

These links are automatically displayed in:
- Header topbar
- Footer section
- Any other location that displays social media icons

### 4. Appearance
- Primary Color
- Secondary Color
- Accent Color
- Header Style
- Footer Layout

### 5. SEO
- Meta Title
- Meta Description
- Meta Keywords
- Google Analytics ID
- Google Search Console Verification

### 6. Email
- Admin Email
- SMTP Configuration
- Mail From Name
- Mail From Address

## How to Update Settings

### Method 1: Through Admin Interface (Recommended)
1. Navigate to **Settings** > **Site Settings**
2. Select the appropriate tab (e.g., "Contact Info" or "Social Media")
3. Fill in or modify the field values
4. Click **Save Settings** at the bottom of the tab
5. Changes are immediately reflected on the frontend

### Method 2: Programmatically (For Developers)
```php
// Get a setting value
$phone = setting('contact_phone', '+237 650 123 456');

// In Blade templates
{{ setting('contact_email', 'default@email.com') }}

// Set a setting value
Setting::set('contact_phone', '+237 650 123 456', 'text', 'contact');
```

## Where Settings Are Displayed

### Contact Information
- **Phone**: Header topbar, footer, contact page
- **Email**: Header topbar, footer, contact page
- **Address**: Header topbar, footer, contact page
- **Map URL**: Contact page (embedded map)
- **Business Hours**: Footer

### Social Media Links
- **All Platforms**: Header topbar, footer
- Displayed as clickable icon buttons
- Links open in new tabs

## Default Values
All settings have sensible default values that display if no custom value is set:
- Contact Phone: `+237 650 123 456`
- Contact Email: `info@abcchildrencentre.com`
- Address: `123 Main Street, Downtown, Douala, Cameroon`
- Social links default to `#` (disabled) if not set

## Tips for Best Results

### Contact Information
- **Phone**: Use international format (e.g., +237 650 123 456)
- **Email**: Use a professional email address
- **Address**: Provide complete address including city and country
- **Business Hours**: Use clear formatting:
  ```
  Monday - Friday: 7:00 AM - 6:00 PM
  Saturday: 8:00 AM - 4:00 PM
  Sunday: Closed
  ```

### Google Maps
1. Go to Google Maps
2. Find your location
3. Click "Share" > "Embed a map"
4. Copy the `src` URL from the iframe code
5. Paste it into the "Google Maps URL" field

### Social Media
- Always use complete URLs (e.g., https://facebook.com/yourpage)
- Test links after saving to ensure they work correctly
- Leave fields empty if you don't have an account on that platform

## Troubleshooting

### Changes not appearing?
- Hard refresh your browser (Ctrl+F5 or Cmd+Shift+R)
- Check that you clicked "Save Settings"
- Ensure you're looking at the correct page

### Social media icons not clickable?
- Make sure you entered complete URLs including `https://`
- Check for typos in the URLs

### Map not displaying on contact page?
- Verify you're using the embed URL, not the regular Google Maps URL
- The URL should start with `https://www.google.com/maps/embed?pb=`

## Technical Notes

### Database Structure
Settings are stored in the `settings` table with the following fields:
- `key`: Unique identifier (e.g., `contact_phone`)
- `value`: The setting value
- `type`: Field type (text, textarea, email, color, image)
- `group`: Category (general, contact, social, appearance, seo, email)
- `description`: Human-readable description

### View Integration
Settings are automatically shared with all views via the `ViewServiceProvider`. Access them using:
- `$siteSettings['key_name']` in Blade templates
- `setting('key_name')` helper function

### Caching
Settings are currently loaded on every request for real-time updates. For production sites with heavy traffic, consider implementing caching in the `ViewServiceProvider`.

## Support
For additional help or custom setting requirements, contact your system administrator.
