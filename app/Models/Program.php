<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Program extends Model
{
    protected $fillable = [
        'title',
        'description',
        'full_description',
        'image',
        'price',
        'currency',
        'teacher_name',
        'teacher_title',
        'teacher_image',
        'total_sits',
        'total_lessons',
        'total_hours',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'total_sits' => 'integer',
        'total_lessons' => 'integer',
        'total_hours' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Scope to get only active programs
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get featured programs
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
        return $query->orderBy('order')->orderBy('created_at');
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        return $this->currency . number_format($this->price, 2);
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }
        return asset('img/program-default.jpg');
    }

    /**
     * Get teacher image URL
     */
    public function getTeacherImageUrlAttribute(): string
    {
        if ($this->teacher_image && Storage::disk('public')->exists($this->teacher_image)) {
            return Storage::url($this->teacher_image);
        }
        return asset('img/teacher-default.jpg');
    }

    /**
     * Accessor for capacity (alias for total_sits)
     */
    public function getCapacityAttribute(): int
    {
        return $this->total_sits;
    }

    /**
     * Accessor for duration (formatted from total_hours)
     */
    public function getDurationAttribute(): ?string
    {
        if ($this->total_hours) {
            return $this->total_hours . ' Hours';
        }
        return null;
    }

    /**
     * Accessor for age_group (you may need to add this column to the database)
     * For now, returning null - you can add this column later
     */
    public function getAgeGroupAttribute(): ?string
    {
        // You can add an age_group column to the programs table
        // or calculate it based on other fields
        return null;
    }
}
