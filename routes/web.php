<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportsController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/authenticate', [LoginController::class,'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/', function () {
    return redirect(route('usuarios.index'));
});
Route::middleware(['auth'])->group(function () {
    Route::get('/reports/by-day', [ReportsController::class,'journeys'])->name('journeys-x-day');
    Route::get('/reports/csv/by-day/{filter_date}', [ReportsController::class,'journeysCsv'])->name('journeys-x-day-csv');

    Route::get('/reports/by-technical', [ReportsController::class,'byTechnical'])->name('by-technical');
    Route::get('/reports/csv/by-technical/{filter_date}/{technical}', [ReportsController::class,'byTechnicalCsv'])->name('by-technical-csv');
    Route::resource('usuarios',UserController::class);
});