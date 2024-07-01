<?php
if (!function_exists('get_setting')) {
    function get_setting($key, $default = null) {
        // Your logic to fetch the setting
        // For example:
        return \App\Models\Setting::where('key', $key)->value('value') ?? $default;
    }
}
