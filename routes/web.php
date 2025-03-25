<?php
/*
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

// CRUD completo
Route::resource('superheroes', SuperheroController::class);

// Rutas adicionales para la papelera
Route::get('/superheroes/trash', [SuperheroController::class, 'trash'])->name('superheroes.trash');
Route::put('/superheroes/restore/{id}', [SuperheroController::class, 'restore'])->name('superheroes.restore');
Route::delete('/superheroes/{id}/force-delete', [SuperheroController::class, 'forceDelete'])->name('superheroes.forceDelete');
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

// Rutas adicionales para la papelera (¡DEFINIR ANTES DEL RESOURCE!)
Route::get('/superheroes/trash', [SuperheroController::class, 'trash'])->name('superheroes.trash');
Route::put('/superheroes/restore/{id}', [SuperheroController::class, 'restore'])->name('superheroes.restore');
Route::delete('/superheroes/{id}/force-delete', [SuperheroController::class, 'forceDelete'])->name('superheroes.forceDelete');

// CRUD completo (definir después de las rutas personalizadas)
Route::resource('superheroes', SuperheroController::class);