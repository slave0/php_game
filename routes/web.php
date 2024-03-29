<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SaveController;
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

Route::get('/', [GameController::class, 'index']);

Route::get('/game', [GameController::class, 'start']);

Route::post('/move', [PlayerController::class, 'move']);

Route::post('/save', [SaveController::class, 'save']);

Route::get('/save', [SaveController::class, 'getSaves']);

Route::post('/load', [SaveController::class, 'load']);

Route::post('/a', function () {
    return 1;
});


