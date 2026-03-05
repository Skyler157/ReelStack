<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('reelstack');
})->name('home');

Route::get('/healthz', function () {
    return response('ok', 200)->header('Content-Type', 'text/plain');
});

Route::view('/about-us', 'about')->name('about');
Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-of-use', 'terms')->name('terms');
