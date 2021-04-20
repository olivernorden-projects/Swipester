<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SwipeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/game/{subject}', [GameController::class, 'store']);
Route::get('/game/{playerHash}', [GameController::class, 'show']);
Route::get('/game', [GameController::class, 'index']);

Route::post('/game/{playerHash}/swipe/{subjectItem}/{approved?}', [SwipeController::class, 'store']);
Route::get('/game/{playerHash}/swipe', [SwipeController::class, 'index']);
