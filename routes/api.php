<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\PlayerController;
use App\Http\Controllers\API\TeamController;
use Illuminate\Support\Facades\Redis;

// Route::group(['prefix' => 'notifications'], function () {
//     Route::post('/publish', [NotificationController::class, 'publish']);
//     Route::get('/recent', [NotificationController::class, 'recent']);
//     Route::get('/summary', [NotificationController::class, 'summary']);
//     Route::put('/{id}/status', [NotificationController::class, 'updateStatus']);
// });


Route::get('/players', [PlayerController::class, 'index']);
Route::post('/players', [PlayerController::class, 'store']);
Route::get('/players/{id}', [PlayerController::class, 'show']);
Route::put('/players/{id}', [PlayerController::class, 'update']);
Route::delete('/players/{id}', [PlayerController::class, 'destroy']);

Route::get('/teams', [TeamController::class, 'index']);
Route::post('/teams', [TeamController::class, 'store']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::put('/teams/{id}', [TeamController::class, 'update']);
Route::delete('/teams/{id}', [TeamController::class, 'destroy']);
Route::get('/winning-percentages', [TeamController::class, 'winningPercentages']);

Route::get('/greet', function () {
    return response()->json(['message' => 'Hello from Laravel API!.Test Api From Laravel']);
});

