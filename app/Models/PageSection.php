<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PageSection extends Model
{
    protected $fillable = [
        'page',
        'section_name',
        'key',
        'value',
        'type',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope to get active sections
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by page
     */
    public function scopePage(Builder $query, string $page): Builder
    {
        return $query->where('page', $page);
    }

    /**
     * Scope to filter by section
     */
    public function scopeSection(Builder $query, string $section): Builder
    {
        return $query->where('section_name', $section);
    }

    /**
     * Get a section value
     */
    public static function getValue(string $page, string $section, string $key, $default = null)
    {
        $pageSection = static::where('page', $page)
            ->where('section_name', $section)
            ->where('key', $key)
            ->where('is_active', true)
            ->first();
        
        return $pageSection ? $pageSection->value : $default;
    }

    /**
     * Set a section value
     */
    public static function setValue(string $page, string $section, string $key, $value, string $type = 'text'): void
    {
        static::updateOrCreate(
            [
                'page' => $page,
                'section_name' => $section,
                'key' => $key,
            ],
            [
                'value' => $value,
                'type' => $type,
                'is_active' => true,
            ]
        );
    }

    /**
     * Get all sections for a page
     */
    public static function getPageSections(string $page): array
    {
        return static::where('page', $page)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('section_name')
            ->map(function ($sections) {
                return $sections->pluck('value', 'key')->toArray();
            })
            ->toArray();
    }
}
