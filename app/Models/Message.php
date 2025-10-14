<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $table = 'contact_messages';
    
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
        return $query->whereIn('status', ['read', 'replied', 'archived']);
    }

    /**
     * Scope to get replied messages
     */
    public function scopeReplied(Builder $query): Builder
    {
        return $query->where('status', 'replied');
    }

    /**
     * Scope to get archived messages
     */
    public function scopeArchived(Builder $query): Builder
    {
        return $query->where('status', 'archived');
    }

    /**
     * Mark message as read
     */
    public function markAsRead(User $user = null): void
    {
        $this->status = 'read';
        $this->read_at = now();
        if ($user) {
            $this->read_by = $user->id;
        }
        $this->save();
    }

    /**
     * Mark message as unread
     */
    public function markAsUnread(): void
    {
        $this->status = 'unread';
        $this->read_at = null;
        $this->read_by = null;
        $this->save();
    }

    /**
     * Mark message as replied
     */
    public function markAsReplied(): void
    {
        $this->status = 'replied';
        $this->save();
    }

    /**
     * Archive message
     */
    public function archive(): void
    {
        $this->status = 'archived';
        $this->save();
    }
}
