<?php

if (!function_exists('redirect')) {
    function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }
}

if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die();
    }
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);
        return $value !== false ? $value : $default;
    }
}

if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        $base = getenv('APP_URL') ?: 'http://localhost';
        return rtrim($base, '/') . '/' . ltrim($path, '/');
    }
}
