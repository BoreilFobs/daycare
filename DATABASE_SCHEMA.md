# 🗄️ Database Schema - Association des Bébés du Cameroun CMS

## Entity Relationship Overview

```
┌─────────────────┐
│     USERS       │
├─────────────────┤
│ • id            │
│ • name          │
│ • email         │
│ • password      │
│ • role          │◄─────┐
│ • avatar        │      │
│ • is_active     │      │
└─────────────────┘      │
                         │ (author_id)
                         │
┌─────────────────┐      │
│   BLOG_POSTS    │      │
├─────────────────┤      │
│ • id            │      │
│ • title         │      │
│ • slug          │      │
│ • excerpt       │      │
│ • content       │      │
│ • featured_image│      │
│ • author_id     │──────┘
│ • author_name   │
│ • author_title  │
│ • author_image  │
│ • views         │
│ • comments_count│
│ • category      │
│ • tags          │
│ • published_at  │
│ • is_published  │
│ • is_featured   │
└─────────────────┘

┌─────────────────┐
│    SETTINGS     │
├─────────────────┤
│ • id            │
│ • key (unique)  │
│ • value         │
│ • type          │
│ • group         │
│ • description   │
└─────────────────┘

┌─────────────────┐
│    SERVICES     │
├─────────────────┤
│ • id            │
│ • title         │
│ • icon          │
│ • description   │
│ • full_desc     │
│ • link          │
│ • order         │
│ • is_active     │
└─────────────────┘

┌─────────────────┐
│    PROGRAMS     │
├─────────────────┤
│ • id            │
│ • title         │
│ • description   │
│ • full_desc     │
│ • image         │
│ • price         │
│ • currency      │
│ • teacher_name  │
│ • teacher_title │
│ • teacher_image │
│ • total_sits    │
│ • total_lessons │
│ • total_hours   │
│ • order         │
│ • is_active     │
│ • is_featured   │
└─────────────────┘

┌─────────────────┐
│     EVENTS      │
├─────────────────┤
│ • id            │
│ • title         │
│ • description   │
│ • full_desc     │
│ • image         │
│ • event_date    │
│ • start_time    │
│ • end_time      │
│ • location      │
│ • location_link │
│ • order         │
│ • is_active     │
│ • is_featured   │
└─────────────────┘

┌─────────────────┐
│  TEAM_MEMBERS   │
├─────────────────┤
│ • id            │
│ • name          │
│ • position      │
│ • bio           │
│ • image         │
│ • email         │
│ • phone         │
│ • facebook_url  │
│ • twitter_url   │
│ • instagram_url │
│ • linkedin_url  │
│ • order         │
│ • is_active     │
└─────────────────┘

┌─────────────────┐
│  TESTIMONIALS   │
├─────────────────┤
│ • id            │
│ • client_name   │
│ • client_position│
│ • client_image  │
│ • message       │
│ • rating (1-5)  │
│ • order         │
│ • is_active     │
│ • is_featured   │
└─────────────────┘

┌─────────────────┐
│    GALLERIES    │
├─────────────────┤
│ • id            │
│ • title         │
│ • description   │
│ • image         │
│ • category      │
│ • order         │
│ • is_active     │
└─────────────────┘

┌─────────────────┐
│  PAGE_SECTIONS  │
├─────────────────┤
│ • id            │
│ • page          │
│ • section_name  │
│ • key           │
│ • value         │
│ • type          │
│ • order         │
│ • is_active     │
│ UNIQUE(page,    │
│  section, key)  │
└─────────────────┘
```

---

## 📋 Table Details

### Common Patterns

#### Ordering System
All content tables include an `order` field for custom sorting.

#### Active/Inactive Toggle
Most tables have `is_active` to show/hide without deleting.

#### Featured Content
Key tables (programs, events, blog_posts, testimonials) support `is_featured`.

---

## 🔑 Indexes & Constraints

### Primary Keys
- All tables: `id` (auto-increment)

### Unique Constraints
- `settings.key`
- `blog_posts.slug`
- `page_sections.(page, section_name, key)` - Composite unique

### Foreign Keys
- `blog_posts.author_id` → `users.id` (CASCADE on delete)

---

## 📊 Data Types Summary

### Text Fields
- `VARCHAR(255)`: titles, names, short text
- `TEXT`: descriptions, messages
- `LONGTEXT`: blog content (WYSIWYG)

### Numeric Fields
- `INT`: IDs, counters, ordering
- `DECIMAL(8,2)`: prices
- `TINYINT`: rating (1-5)

### Date/Time
- `TIMESTAMP`: created_at, updated_at, published_at
- `DATE`: event_date
- `TIME`: start_time, end_time

### Boolean
- `BOOLEAN`: is_active, is_published, is_featured

### Enums
- `users.role`: ('user', 'admin')

---

## 🎯 Query Optimization Ready

### Common Queries Supported

1. **Active Content Only**
   ```sql
   WHERE is_active = 1
   ```

2. **Featured Content**
   ```sql
   WHERE is_featured = 1 AND is_active = 1
   ```

3. **Ordered Display**
   ```sql
   ORDER BY order ASC, created_at DESC
   ```

4. **Published Blog Posts**
   ```sql
   WHERE is_published = 1 AND published_at <= NOW()
   ```

5. **Upcoming Events**
   ```sql
   WHERE event_date >= CURDATE() AND is_active = 1
   ORDER BY event_date ASC
   ```

6. **Gallery by Category**
   ```sql
   WHERE category = 'events' AND is_active = 1
   ```

---

## 🔄 Relationships

### One-to-Many
- **User → Blog Posts**: One user can author multiple blog posts
  - `users.id` ← `blog_posts.author_id`

### Future Considerations
- Comments system (blog_posts → comments)
- Categories table (instead of string)
- Tags table (many-to-many with blog_posts)
- Event registrations
- Program enrollments

---

## 💾 Storage Considerations

### Image Paths
All image fields store relative paths:
- Example: `uploads/programs/program-1.jpg`
- Storage: Laravel Storage (public disk)
- Access: `storage/app/public/uploads/`

### Recommended Directory Structure
```
storage/app/public/
├── uploads/
│   ├── settings/
│   │   ├── logo.png
│   │   └── favicon.ico
│   ├── programs/
│   │   ├── program-1.jpg
│   │   └── program-2.jpg
│   ├── events/
│   ├── blog/
│   ├── team/
│   ├── testimonials/
│   ├── gallery/
│   └── teachers/
```

---

## 🚀 Scalability Features

### Built-in Flexibility
- ✅ Dynamic settings (key-value pairs)
- ✅ Dynamic page sections
- ✅ Extensible content types
- ✅ Soft-delete ready (is_active)
- ✅ Multi-language ready (can add locale field)
- ✅ SEO-friendly (slugs, meta fields)

### Performance Optimizations
- Indexed foreign keys
- Efficient data types
- Nullable fields where appropriate
- Composite unique constraints

---

## 📈 Statistics Tracking

### Built-in Counters
- Blog post views
- Blog post comments count
- Event registrations (future)
- Program enrollments (future)

### Timestamps
- All tables: `created_at`, `updated_at`
- Blog posts: `published_at`
- Events: `event_date`, `start_time`, `end_time`

---

**Schema Version:** 1.0
**Last Updated:** October 13, 2025
**Status:** Production Ready ✅
