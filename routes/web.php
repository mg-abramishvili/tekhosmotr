<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\TechpointController;
use App\Http\Controllers\FrontTechpointController;
use App\Http\Controllers\LeadController;
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

// PAGES (BACKEND)
Route::resource('/backend/pages', PageController::class)->middleware('auth');

// LEADS (BACKEND)
Route::resource('/backend/leads', LeadController::class)->middleware('auth');
Route::get('/backend/leads-period/{month}', 'App\Http\Controllers\LeadController@index_period')->middleware('auth');

// PAGES (FRONT)
Route::get('/p/{slug}', 'App\Http\Controllers\FrontPageController@show');

// TECHPOINTS (FRONT)
Route::get('/city/{city}', 'App\Http\Controllers\FrontTechpointController@index')->name('indexpage');
Route::get('/techpoint/{id}', 'App\Http\Controllers\FrontTechpointController@show')->name('techpointpage');
Route::get('/appointment/{id}/{cat}/{date}', 'App\Http\Controllers\FrontTechpointController@appointment')->name('techpointpage_appoinment');

// LEADS
Route::post('/email/{id}', 'App\Http\Controllers\FrontTechpointController@lead');
