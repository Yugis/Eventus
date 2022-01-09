<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/store', [EventController::class, 'store'])->name('events.store');
        Route::get('/show/{event}', [EventController::class, 'show'])->name('events.show');
        Route::get('/edit/{event}', [EventController::class, 'edit'])->name('events.edit')->middleware('can:update,event');
        Route::put('/update/{event}', [EventController::class, 'update'])->name('events.update')->middleware('can:update,event');
        Route::delete('/delete/{event}', [EventController::class, 'destroy'])->name('events.delete')->middleware('can:update,event');

        Route::post('register/{event}', [EventRegistrationController::class, 'store'])->name('eventRegistration.store');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
