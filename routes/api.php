<?php

use App\Http\Controllers\Api\DownloadTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/downloads', [DownloadTaskController::class, 'store'])->middleware('throttle:downloads');
Route::get('/downloads/{downloadTask}', [DownloadTaskController::class, 'show']);
Route::get('/downloads/{downloadTask}/file', [DownloadTaskController::class, 'file']);
