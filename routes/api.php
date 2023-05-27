<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\AccessLogTrackersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes Link
Route::group(['prefix' => 'link'], function () {
    Route::get('/', [LinksController::class, 'index']);
    Route::post('/', [LinksController::class, 'store']);
    Route::get('/{id}', [LinksController::class, 'show']);
    Route::put('/{id}', [LinksController::class, 'update']);
    Route::delete('/{id}', [LinksController::class, 'destroy']);
});

// Routes Access Log Tracker
Route::group(['prefix' => 'access-log-tracker'], function () {
    Route::get('/', [AccessLogTrackersController::class, 'index']);
    Route::post('/', [AccessLogTrackersController::class, 'store']);
    Route::get('/{id}', [AccessLogTrackersController::class, 'show']);
    Route::put('/{id}', [AccessLogTrackersController::class, 'update']);
    Route::delete('/{id}', [AccessLogTrackersController::class, 'destroy']);
});
