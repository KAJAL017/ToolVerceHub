<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

// Check if we're in the public folder already
if (file_exists(__DIR__.'/server.php')) {
    header('Location: /public/index.php');
    exit;
}

// Otherwise, load from public folder
require __DIR__.'/public/index.php';
