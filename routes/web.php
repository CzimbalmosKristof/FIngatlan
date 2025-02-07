<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngatlanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/ingatlan',[IngatlanController::class, 'index']);
Route::post('api/ingatlan',[IngatlanController::class, 'create']);
Route::delete('api/ingatlan/{id}',[IngatlanController::class, 'delete']);