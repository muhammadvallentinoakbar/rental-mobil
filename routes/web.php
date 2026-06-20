<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;

Route::get('/', function () {
    return redirect('/mobil');
});

Route::get('/test-session', function () {
    session(['cek' => 'halo']);
    return response()->json([
        'session_id' => session()->getId(),
        'session_driver' => config('session.driver'),
        'has_value' => session('cek'),
        'all_session' => session()->all(),
    ]);
});
Route::get('/csrf-test', function () {
    return [
        'session_id' => session()->getId(),
        'csrf_token' => csrf_token(),
        'session' => session()->all(),
        'cookies' => request()->cookies->all(),
    ];
});
Route::post('/mobil-test', function () {
    dd(request()->all());
});
Route::post('/mobil-test', function () {
    dd(request()->all());
});
Route::resource('mobil', MobilController::class);