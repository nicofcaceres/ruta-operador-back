<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\JourneyController;
use App\Http\Middleware\Sanctum;
 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/m/authenticate', [LoginController::class,'authenticateMobile'])->name('authenticateMobile');

Route::middleware(Sanctum::class)
->group(function(){
    Route::post('/m/locations', [RouteController::class,'create']);
    Route::post('/m/journey/start', [JourneyController::class,'startJourney']);
    Route::post('/m/journey/end/{journeyId}', [JourneyController::class,'endJourney']);
});

