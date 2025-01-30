<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngatlanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/ingatlan',[IngatlanController::class, 'index']);