<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'full_description',
        'image',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'max_attendees',
        'price',
        'is_published',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'event_date' => 'date',
        'price' => 'decimal:2',
        'max_attendees' => 'integer',
        'order' => 'integer',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Relationship: Event has many registrations
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * Scope to get only active events
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get featured events
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to get upcoming events
     */
    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('event_date', '>=', Carbon::today());
    }

    /**
     * Scope to get past events
     */
    public function scopePast(Builder $query): Builder
    {
        return $query->where('event_date', '<', Carbon::today());
    }

    /**
     * Scope to order by event date
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('event_date')->orderBy('start_time');
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }
        return asset('img/event-default.jpg');
    }

    /**
     * Check if event is upcoming
     */
    public function getIsUpcomingAttribute(): bool
    {
        return $this->event_date >= Carbon::today();
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->event_date->format('d M Y');
    }

    /**
     * Get formatted time range
     */
    public function getTimeRangeAttribute(): string
    {
        if ($this->start_time && $this->end_time) {
            return $this->start_time->format('h:i A') . ' - ' . $this->end_time->format('h:i A');
        }
        return $this->start_time ? $this->start_time->format('h:i A') : '';
    }
}
