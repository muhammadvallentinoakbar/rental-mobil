<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Illuminate\Http\Request::capture();
    $response = $kernel->handle($request);

    echo "STATUS: " . $response->getStatusCode() . "<br>";
    echo "CONTENT LENGTH: " . strlen($response->getContent()) . "<br>";
    echo "CONTENT: " . htmlspecialchars($response->getContent());

} catch (\Throwable $e) {
    echo "ERROR CAUGHT:<br>";
    echo "Message: " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}