<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\KennelController;
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
