<?php

echo "Step 1: PHP OK<br>";

require __DIR__ . '/../vendor/autoload.php';
echo "Step 2: Autoload OK<br>";

$app = require_once __DIR__ . '/../bootstrap/app.php';
echo "Step 3: App bootstrap OK<br>";

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
echo "Step 4: Kernel OK<br>";