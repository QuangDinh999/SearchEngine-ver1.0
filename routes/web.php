<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/search', [\App\Http\Controllers\PersonController::class, 'index'])->name('person.search');
Route::get('/history', [\App\Http\Controllers\HistoryChatController::class, 'index'])->name('history.search');
Route::get('/del_session', [\App\Http\Controllers\HistoryChatController::class, 'destroy'])->name('history.destroy');




