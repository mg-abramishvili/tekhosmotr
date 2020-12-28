<?php

use App\Http\Controllers\TechpointController;
use App\Http\Controllers\FrontTechpointController;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/', function () {
    return redirect('/city/ufa');
});

// TECHPOINTS (BACKEND)
Route::resource('/backend/techpoints', TechpointController::class)->middleware('auth');
Route::get('/backend/techpoints/delete/{id}','App\Http\Controllers\TechpointController@delete')->middleware('auth');

// TECHPOINTS (FRONT)
Route::get('/city/{city}', 'App\Http\Controllers\FrontTechpointController@index');
Route::get('/techpoint/{id}', 'App\Http\Controllers\FrontTechpointController@show');