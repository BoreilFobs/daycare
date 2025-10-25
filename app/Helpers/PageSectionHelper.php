<?php

use App\Models\PageSection;
use Illuminate\Support\Facades\Cache;

if (!function_exists('page_section')) {
    /**
     * Get a page section value by page, section_name, and key
     * 
     * @param string $page
     * @param string $sectionName
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function page_section(string $page, string $sectionName, string $key, $default = '')
    {
        $section = PageSection::where('page', $page)
            ->where('section_name', $sectionName)
            ->where('key', $key)
            ->first();
        
        return $section ? $section->value : $default;
    }
}

if (!function_exists('all_page_sections')) {
    /**
     * Get all page sections for a specific page, grouped by section_name
     * 
     * @param string $page
     * @return \Illuminate\Support\Collection
     */
    function all_page_sections(string $page)
    {
        return PageSection::where('page', $page)
            ->get()
            ->groupBy('section_name')
            ->map(function ($sections) {
                return $sections->pluck('value', 'key');
            });
    }
}

if (!function_exists('clear_page_sections_cache')) {
    /**
     * Clear page sections cache
     * 
     * @param string|null $page
     * @return void
     */
    function clear_page_sections_cache(?string $page = null)
    {
        if ($page) {
            Cache::forget("all_page_sections_{$page}");
            
            // Clear individual section caches for this page
            $sections = PageSection::where('page', $page)->get();
            foreach ($sections as $section) {
                Cache::forget("page_section_{$page}_{$section->section_name}_{$section->key}");
            }
        } else {
            // Clear all page sections cache
            Cache::flush();
        }
    }
}
