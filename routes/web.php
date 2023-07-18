<?php

use App\Http\Controllers\SpeakerController;
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
Route::get('/speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
Route::post('/speakers', [SpeakerController::class, 'store'])->name('speakers.store');
