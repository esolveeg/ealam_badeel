<?php
if (!function_exists('loadImage')) {
    function loadImage($path)
    {
        return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : $path;
    }
}
