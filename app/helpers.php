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
        return \App\Models\Setting::get($key, $default);
    }
}
