<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventController;


Route::prefix('events')->controller(EventController::class)->name('events.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{event}/edit', 'edit')->name('edit');
    Route::put('/{event}', 'update')->name('update');
    Route::delete('/events/{id}','destroy')->name('destroy');

});


Route::prefix('attendance')->controller(AttendeeController::class)->group(function () {
    Route::get('/register', 'create')->name('attendees.create');
    Route::post('/register', 'store')->name('attendees.store');
});

