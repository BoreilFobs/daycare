<?php

if (!function_exists('setting')) {
    /**
     * Get a setting value by key with an optional default
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        // You can implement this to fetch from database
        // For now, return default or from config
        return config('settings.' . $key, $default);
    }
}
