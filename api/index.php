<?php

$storagePath = '/tmp/storage';

putenv("LARAVEL_STORAGE_PATH={$storagePath}");
$_ENV['LARAVEL_STORAGE_PATH'] = $storagePath;
$_SERVER['LARAVEL_STORAGE_PATH'] = $storagePath;

foreach ([
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/testing',
    $storagePath . '/framework/views',
    $storagePath . '/logs',
    $storagePath . '/app/public',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';