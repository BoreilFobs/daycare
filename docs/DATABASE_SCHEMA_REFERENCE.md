# Database Schema Reference - Admin Tables

Quick reference for all column names to prevent SQL errors.

---

## Core Content Tables

### 1. services
```
✅ Columns:
- id
- title
- icon
- description
- full_description
- link
- order
- is_active
- created_at
- updated_at
```

**Common Queries**:
```php
Service::orderBy('order')->get()
Service::where('is_active', true)->get()
```

---

### 2. programs
```
✅ Columns:
- id
- title
- description
- full_description
- image
- price
- currency
- teacher_name
- teacher_title
- teacher_image      ← Note: teacher_image (not teacher_photo)
- total_sits
- total_lessons
- total_hours
- order
- is_active
- is_featured
- created_at
- updated_at
```

**Common Queries**:
```php
Program::featured()->get()  // Uses is_featured scope
Program::orderBy('order')->get()
Program::where('is_active', true)->get()
```

---

### 3. events
```
✅ Columns:
- id
- title
- description
- full_description
- image
- event_date
- start_time
- end_time
- location
- location_link
- order
- is_active
- is_featured
- created_at
- updated_at
```

**Important**: No `max_attendees` column in current schema!

**Common Queries**:
```php
Event::upcoming()->get()  // Uses event_date scope
Event::where('event_date', '>=', now())->get()
Event::featured()->get()
```

---

### 4. blog_posts
```
✅ Columns:
- id
- title
- slug
- excerpt
- content
- featured_image
- author_id
- author_name
- author_title
- author_image
- views                 ← NOT views_count!
- comments_count        ← Direct column (not aggregate)
- category
- tags
- published_at
- is_published
- is_featured
- created_at
- updated_at
```

**CRITICAL**:
- Use `views` not `views_count` ✅
- `comments_count` exists as direct column
- Also use `withCount('comments')` for dynamic count

**Common Queries**:
```php
BlogPost::published()->get()
BlogPost::orderBy('views', 'desc')->get()  // ✅ Correct
BlogPost::withCount('comments')->get()
```

---

### 5. blog_comments
```
✅ Columns:
- id
- blog_post_id
- parent_id         ← For nested comments
- name
- email
- comment
- ip_address
- user_agent
- status            ← pending, approved, rejected
- approved_at
- approved_by
- created_at
- updated_at
```

**Common Queries**:
```php
BlogComment::pending()->get()
BlogComment::approved()->get()
BlogComment::where('blog_post_id', $id)->get()
```

---

## User Interaction Tables

### 6. testimonials
```
✅ Columns:
- id
- client_name
- email
- phone
- client_position
- client_image
- message
- ip_address
- status            ← pending, approved, rejected
- submitted_at
- approved_at
- approved_by
- rating           ← 1-5 stars
- order
- is_active
- is_featured
- created_at
- updated_at
```

**Common Queries**:
```php
Testimonial::approved()->get()
Testimonial::pending()->get()
Testimonial::featured()->get()
Testimonial::orderBy('order')->get()
```

---

### 7. contact_messages
```
✅ Columns:
- id
- name
- email
- phone
- subject
- message
- ip_address
- status           ← new, in_progress, resolved, closed
- read_at          ← Timestamp
- read_by          ← Admin user ID
- admin_notes      ← Internal notes
- created_at
- updated_at
```

**Common Queries**:
```php
ContactMessage::unread()->get()  // where('read_at', null)
ContactMessage::where('status', 'new')->get()
ContactMessage::latest()->get()
```

---

### 8. event_registrations
```
✅ Columns:
- id
- event_id
- name
- email
- phone
- number_of_attendees
- message
- ip_address
- status           ← pending, confirmed, cancelled
- confirmed_at
- confirmed_by
- admin_notes
- created_at
- updated_at
```

**Common Queries**:
```php
EventRegistration::pending()->get()
EventRegistration::confirmed()->get()
EventRegistration::where('event_id', $id)->get()
```

---

## Team & Media Tables

### 9. team_members
```
✅ Columns:
- id
- name
- position
- bio
- image
- email
- phone
- facebook_url
- twitter_url
- instagram_url
- linkedin_url
- order
- is_active
- created_at
- updated_at
```

**Common Queries**:
```php
TeamMember::orderBy('order')->get()
TeamMember::where('is_active', true)->get()
```

---

### 10. gallery
```
✅ Columns:
- id
- title
- description
- image
- category
- order
- is_active
- created_at
- updated_at
```

**Common Queries**:
```php
Gallery::orderBy('order')->get()
Gallery::where('category', $category)->get()
```

---

## Common Column Patterns

### Status Fields
Most tables use consistent status values:

**Approval Status**:
- `pending` → Awaiting review
- `approved` → Accepted/published
- `rejected` → Denied

**Message Status**:
- `new` → Not yet viewed
- `in_progress` → Being handled
- `resolved` → Issue fixed
- `closed` → Archived

**Registration Status**:
- `pending` → Awaiting confirmation
- `confirmed` → Accepted
- `cancelled` → Rejected/withdrawn

### Boolean Fields
- `is_active` → Show/hide from public
- `is_featured` → Highlight/pin item
- `is_published` → Publish status

### Ordering
- `order` → Integer for sorting (all sortable tables)

### Timestamps
- `created_at`, `updated_at` → Standard Laravel
- `*_at` → Specific timestamps (approved_at, read_at, etc.)
- `*_by` → User ID who performed action

---

## Common Mistakes to Avoid

### ❌ Wrong Column Names
```php
// WRONG
$post->views_count      // ❌ Column doesn't exist
$program->teacher_photo // ❌ It's teacher_image
$event->max_attendees   // ❌ Column doesn't exist
```

### ✅ Correct Column Names
```php
// CORRECT
$post->views            // ✅ Direct column
$program->teacher_image // ✅ Correct name
$event->event_date      // ✅ Use this
```

---

## Aggregate Counts

### Direct Columns (In Database)
```php
$post->views           // Direct column in blog_posts
$post->comments_count  // Direct column in blog_posts
```

### Dynamic Counts (withCount)
```php
$post = BlogPost::withCount(['comments'])->first();
echo $post->comments_count;  // From withCount(), may differ from direct column

$event = Event::withCount(['registrations'])->first();
echo $event->registrations_count;  // From withCount()
```

---

## Quick Reference Card

| Table | Status Column | Order Column | Featured Column | Notes |
|-------|---------------|--------------|-----------------|-------|
| services | is_active | order | - | |
| programs | is_active | order | is_featured | Has teacher fields |
| events | is_active | order | is_featured | Has date/time |
| blog_posts | is_published | - | is_featured | Use `views` not `views_count` |
| blog_comments | status | - | - | status: pending/approved/rejected |
| testimonials | status, is_active | order | is_featured | Has rating 1-5 |
| contact_messages | status | - | - | status: new/in_progress/resolved/closed |
| event_registrations | status | - | - | status: pending/confirmed/cancelled |
| team_members | is_active | order | - | Has social URLs |
| gallery | is_active | order | - | Has category |

---

## Testing Commands

### Check if Table Exists
```php
Schema::hasTable('table_name')
```

### Get All Columns
```php
Schema::getColumnListing('table_name')
```

### Check Column Type
```php
Schema::getColumnType('table_name', 'column_name')
```

### In Tinker
```bash
php artisan tinker
>>> Schema::getColumnListing('blog_posts')
>>> Schema::hasColumn('blog_posts', 'views_count')  # false
>>> Schema::hasColumn('blog_posts', 'views')        # true
```

---

**Last Updated**: October 13, 2025  
**Purpose**: Prevent SQL errors from incorrect column names  
**Usage**: Reference when writing queries or views
