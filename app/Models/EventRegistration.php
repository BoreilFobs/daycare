<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventRegistration extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'number_of_attendees',
        'message',
        'ip_address',
        'status',
        'confirmed_at',
        'confirmed_by',
        'admin_notes',
    ];

    protected $casts = [
        'number_of_attendees' => 'integer',
        'confirmed_at' => 'datetime',
    ];

    /**
     * Relationship: Registration belongs to event
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Relationship: Registration confirmed by user
     */
    public function confirmedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    /**
     * Scope to get pending registrations
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get confirmed registrations
     */
    public function scopeConfirmed(Builder $query): Builder
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope to get cancelled registrations
     */
    public function scopeCancelled(Builder $query): Builder
    {
        return $query->where('status', 'cancelled');
    }

    /**
     * Confirm registration
     */
    public function confirm(User $user = null): bool
    {
        $this->status = 'confirmed';
        $this->confirmed_at = now();
        if ($user) {
            $this->confirmed_by = $user->id;
        }
        return $this->save();
    }

    /**
     * Cancel registration
     */
    public function cancel(): bool
    {
        $this->status = 'cancelled';
        return $this->save();
    }

    /**
     * Check if registration is pending
     */
    public function getIsPendingAttribute(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if registration is confirmed
     */
    public function getIsConfirmedAttribute(): bool
    {
        return $this->status === 'confirmed';
    }
}
