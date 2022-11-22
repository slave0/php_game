<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\GameController;
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

Route::get('/index', [GameController::class, 'index']);

Route::get('/', function (){
    return view('welcome');
});

Route::get('/indee', function (){
    return 2;
});




Route::get('ajax', [AjaxController::class, 'index']);






Route::get('/start', [GameController::class, 'start']);

Route::get('/new-game', [GameController::class, 'newGame']);


Route::get('/enemy', [GameController::class, 'enemy']);

Route::get('/state/{state}', [GameController::class, 'state']);

Route::get('/save', [GameController::class, 'save']);

Route::get('/load/{id}', [GameController::class, 'load']);

Route::get('/list-save', [GameController::class, 'listSave']);






