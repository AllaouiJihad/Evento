<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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
// Route::get("/search", function () {
//     return "e680";
//  });
Route::get('/search', [EventController::class, 'searchEvents'])->name('search');


Route::middleware(['admin','auth'])->group(function () {
    Route::get('/events',[EventController::class, 'getEvents'])->name('events.getEvents');
    Route::put('/events/{id}',[EventController::class, 'acceptEvent'])->name('accept.event');

    Route::get('users',[UserController::class, 'getUsers'])->name('users.getUsers');

    Route::put('users/{id}',[EventController::class, 'acceptUserEvent'])->name('accept.eventUser');

    Route::get('categories',[CategoryController::class, 'index']);
    Route::delete('/categories/{category}',[CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('categories/',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories',[CategoryController::class, 'store'])->name('category.store');
});
// Organisateur
Route::middleware(['organisateur','auth'])->group(function () {
    Route::get('/myevents',[EventController::class, 'getMyEvents'])->name('Myevents');

    Route::get('/myevents/tickets/{event}',[TicketController::class, 'getTickets'])->name('event.tickets');

    Route::get('events/reservation/{ticket}',[ReservationController::class, 'getReservation'])->name('event.reservation');
    Route::put('events/reservation/{ticket}',[ReservationController::class, 'update'])->name('conferme.reservation');

    Route::delete('myevents/{event}',[EventController::class, 'destroy'])->name('event.destroy');

    Route::put('myevents/tickets/{event}',[TicketController::class, 'edit'])->name('ticket.edit');

});



Route::get('/', [EventController::class , 'index'])->name('home');
Route::get('/category/events/{category}', [CategoryController::class,'CategoryEvents'])->name('show.categoryEvents');

Route::get('/addEvent',[EventController::class, 'create'])->name('event.create');
Route::post('/addEvent',[EventController::class, 'store'])->name('event.store');

Route::get('addticket/{id}',[TicketController::class, 'create'])->name('ticket.create');
Route::post('/addticket',[TicketController::class, 'store'])->name('ticket.store');

Route::get('event/{id}',[EventController::class, 'getEvent'])->name('event.get');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
});


Route::post('event',[ReservationController::class,'reserve'])->name('reserve')->middleware('auth');



require __DIR__.'/auth.php';
