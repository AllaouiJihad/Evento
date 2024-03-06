<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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

Route::get('/', [EventController::class , 'index'])->name('home');
Route::get('/addEvent',[EventController::class, 'create'])->name('event.create');
Route::post('/addEvent',[EventController::class, 'store'])->name('event.store');

Route::get('addticket/{id}',[TicketController::class, 'create'])->name('ticket.create');
Route::post('/addticket',[TicketController::class, 'store'])->name('ticket.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('events',[EventController::class, 'getEvents'])->name('events.getEvents');
require __DIR__.'/auth.php';
