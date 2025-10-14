<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'email',
        'phone',
        'client_position',
        'client_image',
        'message',
        'rating',
        'ip_address',
        'status',
        'submitted_at',
        'approved_at',
        'approved_by',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'rating' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    /**
     * Relationship: Testimonial approved by user
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Scope to get only active testimonials
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get approved testimonials
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope to get pending testimonials
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get rejected testimonials
     */
    public function scopeRejected(Builder $query): Builder
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Scope to get featured testimonials
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to order by custom order
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->client_image && Storage::disk('public')->exists($this->client_image)) {
            return Storage::url($this->client_image);
        }
        return asset('img/testimonial-default.jpg');
    }

    /**
     * Get star rating HTML
     */
    public function getStarsHtmlAttribute(): string
    {
        $html = '';
        for ($i = 1; $i <= 5; $i++) {
            $class = $i <= $this->rating ? 'fas fa-star text-primary' : 'far fa-star';
            $html .= '<i class="' . $class . '"></i>';
        }
        return $html;
    }

    /**
     * Approve testimonial
     */
    public function approve(User $user = null): bool
    {
        $this->status = 'approved';
        $this->approved_at = now();
        if ($user) {
            $this->approved_by = $user->id;
        }
        return $this->save();
    }

    /**
     * Reject testimonial
     */
    public function reject(): bool
    {
        $this->status = 'rejected';
        return $this->save();
    }
}
