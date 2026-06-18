<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;

Route::get('/', function () {
    return redirect('/mobil');
});

Route::resource('mobil', MobilController::class);
