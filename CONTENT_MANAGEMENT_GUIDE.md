# Dynamic Content Management System - Usage Guide

## Overview
All content on the website is now fully manageable through the admin panel via the **Page Sections** feature. This allows you to edit every piece of text, image, and video on the site without touching code.

## How It Works

### 1. Page Sections Structure
Content is organized by:
- **Page**: The page where content appears (e.g., home, about, contact)
- **Section**: The section within the page (e.g., hero, about, programs)
- **Key**: The specific content field (e.g., title, subtitle, description)

### 2. Using in Blade Templates

#### Method 1: Using the Helper Function
```blade
{{ page_section('home', 'hero', 'title', 'Default Title') }}
```

Parameters:
1. `page` - The page name (home, about, contact, etc.)
2. `section_name` - The section name (hero, about, services, etc.)
3. `key` - The specific field (title, subtitle, description, etc.)
4. `default` - Fallback value if not found in database

#### Method 2: Using Grouped Sections (Controller)
```php
// In Controller
$pageSections = all_page_sections('home');
return view('welcome', compact('pageSections'));
```

```blade
{{-- In Blade View --}}
{{ $pageSections['hero']['title'] ?? 'Default Title' }}
{{ $pageSections['hero']['subtitle'] ?? 'Default Subtitle' }}
{{ $pageSections['about']['description'] ?? 'Default Description' }}
```

### 3. Available Pages and Sections

#### Home Page (`page: home`)
- **hero**: title, subtitle, button_1_text, button_1_link, button_2_text, button_2_link, video_url
- **about**: title, heading, description, feature_1 through feature_6
- **programs**: title, heading
- **services**: title, heading
- **events**: title, heading
- **gallery**: title, heading
- **testimonials**: title, heading
- **blog**: title, heading

#### About Page (`page: about`)
- **header**: title
- **about**: title, heading, description

#### Programs Page (`page: programs`)
- **header**: title
- **content**: title, heading

#### Events Page (`page: events`)
- **header**: title
- **content**: title, heading

#### Blog Page (`page: blog`)
- **header**: title
- **content**: title, heading

#### Contact Page (`page: contact`)
- **header**: title
- **content**: title, heading, description
- **info**: address, email, phone, map_embed

#### Services Page (`page: services`)
- **header**: title
- **content**: title, heading

#### Team Page (`page: team`)
- **header**: title
- **content**: title, heading

#### Testimonials Page (`page: testimonials`)
- **header**: title
- **content**: title, heading

### 4. Managing Content in Admin Panel

1. Navigate to **Admin Panel → Page Sections**
2. Select the page you want to edit from the filter tabs
3. Click **Edit** on any section to modify its content
4. Changes appear on the website immediately (or after cache clears)

### 5. Content Types

- **text**: Short single-line text
- **textarea**: Multi-line text
- **wysiwyg**: Rich text editor with formatting
- **image**: Image upload
- **video**: Video URL (YouTube embed, etc.)
- **color**: Color picker

### 6. Cache Management

Page sections are cached for 1 hour for performance. To clear cache:
```php
clear_page_sections_cache('home'); // Clear specific page
clear_page_sections_cache(); // Clear all pages
```

Or via admin panel after saving changes.

### 7. Example Usage in Views

```blade
{{-- Hero Section --}}
<h1>{{ page_section('home', 'hero', 'title', 'Welcome to Our Daycare') }}</h1>
<p>{{ page_section('home', 'hero', 'subtitle', 'Best Care for Your Kids') }}</p>
<a href="{{ page_section('home', 'hero', 'button_1_link', '/contact') }}">
    {{ page_section('home', 'hero', 'button_1_text', 'Get Started') }}
</a>

{{-- About Section --}}
<h4>{{ $pageSections['about']['title'] ?? 'About Us' }}</h4>
<h1>{{ $pageSections['about']['heading'] ?? 'Our Mission' }}</h1>
<p>{{ $pageSections['about']['description'] ?? 'Default description...' }}</p>

{{-- Contact Info --}}
<p>{{ $pageSections['info']['address'] ?? '123 Main St' }}</p>
<p>{{ $pageSections['info']['email'] ?? 'info@example.com' }}</p>
<p>{{ $pageSections['info']['phone'] ?? '555-1234' }}</p>
```

### 8. Database Structure

**Table**: `page_sections`

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| page | string | Page identifier (home, about, contact, etc.) |
| section_name | string | Section within the page (hero, about, services) |
| key | string | Specific content field (title, subtitle, description) |
| value | text | The actual content value |
| type | string | Content type (text, textarea, image, video, wysiwyg, color) |
| order | integer | Display order |
| is_active | boolean | Active status |

**Unique Constraint**: (`page`, `section_name`, `key`)

### 9. Adding New Page Sections

To add a new editable section:

1. **Via Database Seeder** (for defaults):
```php
PageSection::create([
    'page' => 'home',
    'section_name' => 'new_section',
    'key' => 'custom_field',
    'value' => 'Default value',
    'type' => 'text',
    'order' => 100,
]);
```

2. **Via Admin Panel**:
- Go to Page Sections → Create New
- Fill in the form with page, section, key, value, type

3. **Use in View**:
```blade
{{ page_section('home', 'new_section', 'custom_field') }}
```

### 10. Dynamic Data from Database

All pages now fetch real data from the database:

- **Programs**: Displays active programs from `programs` table
- **Events**: Shows upcoming/past events from `events` table  
- **Blog**: Lists published blog posts from `blog_posts` table
- **Services**: Shows active services from `services` table
- **Team**: Displays active team members from `team_members` table
- **Testimonials**: Shows approved testimonials from `testimonials` table
- **Gallery**: Displays active gallery images from `gallery_images` table

All content is managed through the admin panel with full CRUD operations.

## Benefits

✅ **No Code Changes Needed**: Edit content via admin panel  
✅ **Instant Updates**: Changes reflect immediately on the website  
✅ **Full Control**: Every text element is editable  
✅ **Type-Safe**: Different field types for different content  
✅ **Cached for Performance**: 1-hour cache for fast page loads  
✅ **Database-Driven**: All programs, events, blog posts, etc. come from database  
✅ **Admin-Friendly**: Easy-to-use interface for content managers
