<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'ip_address',
        'status',
        'read_at',
        'read_by',
        'admin_notes',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    /**
     * Relationship: Message read by user
     */
    public function readBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'read_by');
    }

    /**
     * Scope to get unread messages
     */
    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('status', 'unread');
    }

    /**
     * Scope to get read messages
     */
    public function scopeRead(Builder $query): Builder
    {
        return $query->whereIn('status', ['read', 'replied']);
    }

    /**
     * Scope to get archived messages
     */
    public function scopeArchived(Builder $query): Builder
    {
        return $query->where('status', 'archived');
    }

    /**
     * Mark as read
     */
    public function markAsRead(User $user = null): bool
    {
        $this->status = 'read';
        $this->read_at = now();
        if ($user) {
            $this->read_by = $user->id;
        }
        return $this->save();
    }

    /**
     * Mark as replied
     */
    public function markAsReplied(): bool
    {
        $this->status = 'replied';
        return $this->save();
    }

    /**
     * Archive message
     */
    public function archive(): bool
    {
        $this->status = 'archived';
        return $this->save();
    }

    /**
     * Check if message is unread
     */
    public function getIsUnreadAttribute(): bool
    {
        return $this->status === 'unread';
    }
}
