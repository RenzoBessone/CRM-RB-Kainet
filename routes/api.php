<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PositionController;


Route::get('productos', 'ProductController@index');

Route::post('posiciones', 'PositionController@store');
Route::get('/posiciones', [PositionController::class, 'index']);
