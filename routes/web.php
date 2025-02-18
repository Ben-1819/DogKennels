<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\KennelController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::name('owner.')->group(function(){
    Route::get('/owner', [OwnerController::class, 'index'])->name('index');
    Route::get('/owner/create', [OwnerController::class, 'create'])->name('create');
    Route::post('/owner', [OwnerController::class, 'store'])->name('store');
    Route::get('/owner/{id}', [OwnerController::class, 'show'])->name('show');
    Route::get('/owner/{id}/edit', [OwnerController::class, 'edit'])->name('edit');
    Route::put('/owner/{id}', [OwnerController::class, 'update'])->name('update');
    Route::delete('/owner{id}', [OwnerController::class, 'destroy'])->name('destroy');
});

Route::name('dog.')->group(function(){
    Route::get('/dog', [DogController::class, 'index'])->name('index');
    Route::get('/dog/create', [DogController::class, 'create'])->name('create');
    Route::post('/dog', [DogController::class, 'store'])->name('store');
    Route::get('/dog/{id}', [DogController::class, 'show'])->name('show');
    Route::get('/dog/{id}/edit', [DogController::class, 'edit'])->name('edit');
    Route::put('/dog/{id}', [DogController::class, 'update'])->name('update');
    Route::delete('/dog/{id}', [DogController::class, 'destroy'])->name('destroy');
});


Route::name('kennel.')->group(function(){
    Route::get('/kennel', [KennelController::class, 'index'])->name('index');
    Route::get('/kennel/create', [KennelController::class, 'create'])->name('create');
    Route::post('/kennel', [KennelController::class, 'store'])->name('store');
    Route::get('/kennel/{id}', [KennelController::class, 'show'])->name('show');
    Route::get('/kennel/{id}/edit', [KennelController::class, 'edit'])->name('edit');
    Route::put('/kennel/{id}', [KennelController::class, 'update'])->name('update');
    Route::delete('/kennel/{id}', [KennelController::class, 'destroy'])->name('destroy');
});


Route::name('booking.')->group(function(){
    Route::get('/booking', [BookingController::class, 'index'])->name('index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('create');
    Route::post('/booking', [BookingController::class, 'store'])->name('store');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('show');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('update');
    Route::delete('/booking/{id}', [BookingController::class, 'destory'])->name('destroy');
});

Route::name('menu.')->group(function(){
    Route::get('/owner/menu', function(){
        return view('owner.menu');
    })->name('owner');

    Route::get('/dog/menu', function(){
        return view('dog.menu');
    })->name('dog');

    Route::get('/kennel/menu', function(){
        return view('kennel.menu');
    })->name('kennel');

    Route::get('/booking/menu', function(){
        return view('booking.menu');
    })->name('booking');
});
