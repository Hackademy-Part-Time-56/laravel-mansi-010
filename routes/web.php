<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('index');

Route::get('/crea-libro', [BookController::class, 'create'])->name('create')->middleware('auth');
Route::post('/salva-libro', [BookController::class, 'store'])->name('store')->middleware('auth');

Route::get('/mostra-libro/{book}', [BookController::class, 'show'])->name('show');

Route::get('/modifica-libro/{book}', [BookController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/aggiorna-libro/{book}', [BookController::class, 'update'])->name('update')->middleware('auth');

Route::delete('/cancella-libro/{book}', [BookController::class, 'destroy'])->name('destroy')->middleware('auth');

Route::resource(
    '/authors',
    AuthorController::class,
);
