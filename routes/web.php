<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PositionController;

Route::middleware('auth')->get('/posiciones', [PosicionController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/posiciones', [PositionController::class, 'index']);
Route::post('/posiciones', [PositionController::class, 'store']);
