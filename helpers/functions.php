<?php
if ( ! function_exists('config_path')) {
    /**
     * Get the configuration path.
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('is_lumen')) {
    /**
     * Check if we're in a lumen application
     * @return bool
     */
    function is_lumen()
    {
        return str_contains(str_app()->version(), 'Lumen');
    }
}