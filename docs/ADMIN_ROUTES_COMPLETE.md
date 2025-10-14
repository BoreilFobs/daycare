# Complete Admin Routes Documentation

## Overview
All admin routes have been declared in `routes/web.php` with proper middleware, prefixes, and naming conventions.

---

## Route Structure

### Base Configuration
- **Prefix**: `/admin`
- **Middleware**: `['auth', 'admin']`
- **Route Name Prefix**: `admin.`

---

## Complete Route List

### 1. Dashboard Routes

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/dashboard` | DashboardController@index | admin.dashboard | Main admin dashboard |
| GET | `/admin/stats` | DashboardController@stats | admin.stats | Dashboard statistics (AJAX) |

---

### 2. Services Management (5 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/services` | ServiceController@index | admin.services.index | List all services |
| GET | `/admin/services/create` | ServiceController@create | admin.services.create | Show create form |
| POST | `/admin/services` | ServiceController@store | admin.services.store | Store new service |
| GET | `/admin/services/{id}/edit` | ServiceController@edit | admin.services.edit | Show edit form |
| PUT/PATCH | `/admin/services/{id}` | ServiceController@update | admin.services.update | Update service |
| DELETE | `/admin/services/{id}` | ServiceController@destroy | admin.services.destroy | Delete service |
| POST | `/admin/services/reorder` | ServiceController@reorder | admin.services.reorder | Reorder services (AJAX) |

**Features**:
- Full CRUD operations
- Drag-and-drop reordering
- Icon picker

---

### 3. Programs Management (8 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/programs` | ProgramController@index | admin.programs.index | List all programs |
| GET | `/admin/programs/create` | ProgramController@create | admin.programs.create | Show create form |
| POST | `/admin/programs` | ProgramController@store | admin.programs.store | Store new program |
| GET | `/admin/programs/{id}/edit` | ProgramController@edit | admin.programs.edit | Show edit form |
| PUT/PATCH | `/admin/programs/{id}` | ProgramController@update | admin.programs.update | Update program |
| DELETE | `/admin/programs/{id}` | ProgramController@destroy | admin.programs.destroy | Delete program |
| POST | `/admin/programs/reorder` | ProgramController@reorder | admin.programs.reorder | Reorder programs |
| PATCH | `/admin/programs/{id}/toggle-featured` | ProgramController@toggleFeatured | admin.programs.toggle-featured | Toggle featured status |

**Features**:
- Full CRUD operations
- Dual image upload (program + teacher)
- Featured toggle
- Reordering

---

### 4. Events Management (8 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/events` | EventController@index | admin.events.index | List all events |
| GET | `/admin/events/create` | EventController@create | admin.events.create | Show create form |
| POST | `/admin/events` | EventController@store | admin.events.store | Store new event |
| GET | `/admin/events/{id}/edit` | EventController@edit | admin.events.edit | Show edit form |
| PUT/PATCH | `/admin/events/{id}` | EventController@update | admin.events.update | Update event |
| DELETE | `/admin/events/{id}` | EventController@destroy | admin.events.destroy | Delete event |
| POST | `/admin/events/reorder` | EventController@reorder | admin.events.reorder | Reorder events |
| PATCH | `/admin/events/{id}/toggle-published` | EventController@togglePublished | admin.events.toggle-published | Toggle published status |

**Features**:
- Full CRUD operations
- Date/time pickers
- Location management
- Registration tracking
- Publish toggle

---

### 5. Blog Posts Management (8 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/blog-posts` | BlogPostController@index | admin.blog-posts.index | List all posts |
| GET | `/admin/blog-posts/create` | BlogPostController@create | admin.blog-posts.create | Show create form |
| POST | `/admin/blog-posts` | BlogPostController@store | admin.blog-posts.store | Store new post |
| GET | `/admin/blog-posts/{id}` | BlogPostController@show | admin.blog-posts.show | View single post |
| GET | `/admin/blog-posts/{id}/edit` | BlogPostController@edit | admin.blog-posts.edit | Show edit form |
| PUT/PATCH | `/admin/blog-posts/{id}` | BlogPostController@update | admin.blog-posts.update | Update post |
| DELETE | `/admin/blog-posts/{id}` | BlogPostController@destroy | admin.blog-posts.destroy | Delete post |
| PATCH | `/admin/blog-posts/{id}/toggle-published` | BlogPostController@togglePublished | admin.blog-posts.toggle-published | Toggle published status |

**Features**:
- Full CRUD operations
- Rich text editor
- Dual image upload
- SEO fields
- Publish toggle
- Comments management

---

### 6. Comments Management (6 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/comments` | CommentController@index | admin.comments.index | List all comments |
| GET | `/admin/comments/pending` | CommentController@pending | admin.comments.pending | Show pending comments |
| PATCH | `/admin/comments/{id}/approve` | CommentController@approve | admin.comments.approve | Approve comment (AJAX) |
| PATCH | `/admin/comments/{id}/reject` | CommentController@reject | admin.comments.reject | Reject comment (AJAX) |
| DELETE | `/admin/comments/{id}` | CommentController@destroy | admin.comments.destroy | Delete comment |
| POST | `/admin/comments/bulk-action` | CommentController@bulkAction | admin.comments.bulk-action | Bulk approve/reject/delete |

**Features**:
- Pending queue view
- Approve/reject workflow
- Bulk actions
- AJAX operations
- Nested comments display

---

### 7. Testimonials Management (9 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/testimonials` | TestimonialController@index | admin.testimonials.index | List all testimonials |
| GET | `/admin/testimonials/pending` | TestimonialController@pending | admin.testimonials.pending | Show pending testimonials |
| GET | `/admin/testimonials/create` | TestimonialController@create | admin.testimonials.create | Show create form |
| POST | `/admin/testimonials` | TestimonialController@store | admin.testimonials.store | Store new testimonial |
| GET | `/admin/testimonials/{id}/edit` | TestimonialController@edit | admin.testimonials.edit | Show edit form |
| PUT/PATCH | `/admin/testimonials/{id}` | TestimonialController@update | admin.testimonials.update | Update testimonial |
| DELETE | `/admin/testimonials/{id}` | TestimonialController@destroy | admin.testimonials.destroy | Delete testimonial |
| PATCH | `/admin/testimonials/{id}/approve` | TestimonialController@approve | admin.testimonials.approve | Approve testimonial |
| PATCH | `/admin/testimonials/{id}/reject` | TestimonialController@reject | admin.testimonials.reject | Reject testimonial |
| PATCH | `/admin/testimonials/{id}/toggle-featured` | TestimonialController@toggleFeatured | admin.testimonials.toggle-featured | Toggle featured status |

**Features**:
- Full CRUD operations
- Approval workflow
- Featured toggle
- Client image upload
- Rating system

---

### 8. Contact Messages Management (7 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/messages` | ContactMessageController@index | admin.messages.index | Inbox view |
| GET | `/admin/messages/{id}` | ContactMessageController@show | admin.messages.show | View message details |
| PATCH | `/admin/messages/{id}/mark-read` | ContactMessageController@markAsRead | admin.messages.mark-read | Mark as read |
| PATCH | `/admin/messages/{id}/mark-unread` | ContactMessageController@markAsUnread | admin.messages.mark-unread | Mark as unread |
| PATCH | `/admin/messages/{id}/update-status` | ContactMessageController@updateStatus | admin.messages.update-status | Update status |
| POST | `/admin/messages/{id}/add-note` | ContactMessageController@addNote | admin.messages.add-note | Add internal note |
| DELETE | `/admin/messages/{id}` | ContactMessageController@destroy | admin.messages.destroy | Delete message |

**Features**:
- Email-style inbox
- Read/unread status
- Status workflow (new, in-progress, resolved, closed)
- Internal notes system
- Quick actions

---

### 9. Event Registrations Management (8 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/registrations` | EventRegistrationController@index | admin.registrations.index | List all registrations |
| GET | `/admin/registrations/pending` | EventRegistrationController@pending | admin.registrations.pending | Show pending registrations |
| GET | `/admin/registrations/{id}` | EventRegistrationController@show | admin.registrations.show | View registration details |
| PATCH | `/admin/registrations/{id}/confirm` | EventRegistrationController@confirm | admin.registrations.confirm | Confirm registration |
| PATCH | `/admin/registrations/{id}/cancel` | EventRegistrationController@cancel | admin.registrations.cancel | Cancel registration |
| POST | `/admin/registrations/{id}/add-note` | EventRegistrationController@addNote | admin.registrations.add-note | Add attendee note |
| DELETE | `/admin/registrations/{id}` | EventRegistrationController@destroy | admin.registrations.destroy | Delete registration |

**Features**:
- Registrations list with filters
- Pending queue
- Confirm/cancel workflow
- Attendee notes
- Event filtering

---

### 10. Team Members Management (7 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/team-members` | TeamMemberController@index | admin.team-members.index | List all team members |
| GET | `/admin/team-members/create` | TeamMemberController@create | admin.team-members.create | Show create form |
| POST | `/admin/team-members` | TeamMemberController@store | admin.team-members.store | Store new member |
| GET | `/admin/team-members/{id}` | TeamMemberController@show | admin.team-members.show | View member details |
| GET | `/admin/team-members/{id}/edit` | TeamMemberController@edit | admin.team-members.edit | Show edit form |
| PUT/PATCH | `/admin/team-members/{id}` | TeamMemberController@update | admin.team-members.update | Update member |
| DELETE | `/admin/team-members/{id}` | TeamMemberController@destroy | admin.team-members.destroy | Delete member |
| POST | `/admin/team-members/reorder` | TeamMemberController@reorder | admin.team-members.reorder | Reorder members |

**Features**:
- Full CRUD operations
- Image upload
- Social media links
- Position/role management
- Display order

---

### 11. Gallery Management (5 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/gallery` | GalleryController@index | admin.gallery.index | Gallery grid view |
| POST | `/admin/gallery/upload` | GalleryController@upload | admin.gallery.upload | Bulk image upload |
| PATCH | `/admin/gallery/{id}/update` | GalleryController@update | admin.gallery.update | Update image details |
| DELETE | `/admin/gallery/{id}` | GalleryController@destroy | admin.gallery.destroy | Delete single image |
| POST | `/admin/gallery/bulk-delete` | GalleryController@bulkDelete | admin.gallery.bulk-delete | Delete multiple images |

**Features**:
- Grid/list view toggle
- Drag-and-drop upload (Dropzone)
- Bulk upload
- Bulk delete
- Category filtering
- Lightbox preview

---

### 12. Settings Management (2 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/settings` | SettingController@index | admin.settings.index | Settings editor |
| PUT | `/admin/settings` | SettingController@update | admin.settings.update | Update all settings |

**Features**:
- Grouped settings (General, Contact, Social, SEO, etc.)
- Tab navigation
- Image uploads (logo, favicon)
- Color pickers
- Validation
- Cache clearing

---

### 13. Page Sections Management (3 routes)

| Method | URI | Controller | Route Name | Description |
|--------|-----|------------|------------|-------------|
| GET | `/admin/page-sections` | PageSectionController@index | admin.page-sections.index | List all pages |
| GET | `/admin/page-sections/{page}/edit` | PageSectionController@edit | admin.page-sections.edit | Edit page sections |
| PUT | `/admin/page-sections/{page}` | PageSectionController@update | admin.page-sections.update | Update page sections |

**Features**:
- Dynamic page selector (home, about, services, etc.)
- Section-based editing
- Image uploads
- Rich text editing
- Live preview

---

## Route Count Summary

| Resource | Route Count |
|----------|-------------|
| Dashboard | 2 |
| Services | 7 |
| Programs | 8 |
| Events | 8 |
| Blog Posts | 8 |
| Comments | 6 |
| Testimonials | 10 |
| Messages | 7 |
| Registrations | 7 |
| Team Members | 8 |
| Gallery | 5 |
| Settings | 2 |
| Page Sections | 3 |
| **TOTAL** | **81 routes** |

---

## Middleware Stack

All admin routes protected by:
1. **auth** - Must be logged in
2. **admin** - Must have admin role

```php
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // All admin routes here
});
```

---

## Route Naming Convention

All routes follow Laravel's resource naming:
- **Index**: `admin.{resource}.index`
- **Create**: `admin.{resource}.create`
- **Store**: `admin.{resource}.store`
- **Show**: `admin.{resource}.show`
- **Edit**: `admin.{resource}.edit`
- **Update**: `admin.{resource}.update`
- **Destroy**: `admin.{resource}.destroy`

Custom actions follow pattern:
- `admin.{resource}.{action}`
- Example: `admin.comments.approve`

---

## Testing Commands

### View all routes:
```bash
php artisan route:list
```

### View admin routes only:
```bash
php artisan route:list --path=admin
```

### View specific resource routes:
```bash
php artisan route:list --name=admin.services
```

### Check route exists:
```bash
php artisan route:list | grep "admin.dashboard"
```

---

## Quick Links (After Login as Admin)

- Dashboard: `/admin/dashboard`
- Services: `/admin/services`
- Programs: `/admin/programs`
- Events: `/admin/events`
- Blog Posts: `/admin/blog-posts`
- Comments: `/admin/comments`
- Testimonials: `/admin/testimonials`
- Messages: `/admin/messages`
- Registrations: `/admin/registrations`
- Team: `/admin/team-members`
- Gallery: `/admin/gallery`
- Settings: `/admin/settings`
- Pages: `/admin/page-sections`

---

## Security Notes

### Protected Routes
✅ All admin routes require authentication  
✅ All admin routes check for admin role  
✅ CSRF protection on all POST/PUT/PATCH/DELETE  
✅ Form request validation in controllers  
✅ Middleware prevents direct access

### Example Access Control
```php
// Middleware check (automatic)
if (!Auth::check()) {
    redirect('/login');
}

if (!Auth::user()->isAdmin()) {
    abort(403, 'Unauthorized');
}
```

---

## Next Steps

1. ✅ Routes declared
2. ⏳ Build remaining CRUD views
3. ⏳ Test all routes
4. ⏳ Add route model binding where needed
5. ⏳ Implement AJAX endpoints
6. ⏳ Add API routes if needed

---

**Status**: ✅ All admin routes declared  
**Date**: October 13, 2025  
**Total Routes**: 81 admin routes + public routes  
**Protection**: auth + admin middleware
