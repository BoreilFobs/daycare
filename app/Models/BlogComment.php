<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogComment extends Model
{
    protected $fillable = [
        'blog_post_id',
        'parent_id',
        'name',
        'email',
        'comment',
        'ip_address',
        'user_agent',
        'status',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    /**
     * Relationship: Comment belongs to blog post
     */
    public function blogPost(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class);
    }

    /**
     * Relationship: Comment belongs to parent comment (for replies)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }

    /**
     * Relationship: Comment has many replies
     */
    public function replies(): HasMany
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    /**
     * Relationship: Comment approved by user
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Scope to get approved comments
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope to get pending comments
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get top-level comments (not replies)
     */
    public function scopeTopLevel(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Approve comment
     */
    public function approve(User $user = null): bool
    {
        $this->status = 'approved';
        $this->approved_at = now();
        if ($user) {
            $this->approved_by = $user->id;
        }
        $saved = $this->save();

        // Update blog post comments count
        if ($saved) {
            $this->blogPost->updateCommentsCount();
        }

        return $saved;
    }

    /**
     * Reject comment
     */
    public function reject(): bool
    {
        $this->status = 'rejected';
        return $this->save();
    }

    /**
     * Check if comment is reply
     */
    public function getIsReplyAttribute(): bool
    {
        return !is_null($this->parent_id);
    }
}
