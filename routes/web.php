<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/consultation', function () {
    return view('consultation');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/location', function () {
    return view('location');
});

Route::get('/career', function () {
    return view('career');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/privacy', function () {
    return view('privacy');
});
