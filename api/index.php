<?php

declare(strict_types=1);

// pastikan response plain text
header('Content-Type: text/plain');

// test runtime + debug ringan
echo "VERCEL PHP API ACTIVE\n";
echo "TIME: " . date('Y-m-d H:i:s') . "\n";

// cek environment (kalau kebaca)
echo "APP_ENV: " . ($_ENV['APP_ENV'] ?? 'not set') . "\n";