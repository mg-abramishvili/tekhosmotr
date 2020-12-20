<?php

use App\Http\Controllers\TechpointController;
use App\Http\Controllers\FrontTechpointController;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/', function () {
    return redirect('/techpoints');
});

// TECHPOINTS (BACKEND)
Route::resource('/backend/techpoints', TechpointController::class)->middleware('auth');
Route::get('/backend/techpoints/delete/{id}','App\Http\Controllers\TechpointController@delete')->middleware('auth');

// TECHPOINTS (FRONT)
Route::resource('/techpoints', FrontTechpointController::class);