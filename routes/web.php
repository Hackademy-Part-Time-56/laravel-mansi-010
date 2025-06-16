<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('index');

Route::get('/crea-libro', [BookController::class, 'create'])->name('create');
Route::post('/salva-libro', [BookController::class, 'store'])->name('store');

Route::get('/mostra-libro/{book}', [BookController::class, 'show'])->name('show');

Route::get('/modifica-libro/{book}', [BookController::class, 'edit'])->name('edit');
Route::put('/aggiorna-libro/{book}', [BookController::class, 'update'])->name('update');

Route::delete('/cancella-libro/{book}', [BookController::class, 'destroy'])->name('destroy');
