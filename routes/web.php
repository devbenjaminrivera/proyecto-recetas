<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;

// Redirigir la raíz al catálogo de recetas
Route::get('/', function () {
    return redirect()->route('recetas.index');
});

// Rutas solicitadas para la evaluación
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
Route::get('/recetas/crear', [RecetaController::class, 'create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
Route::get('/recetas/{id}', [RecetaController::class, 'show'])->name('recetas.show');
Route::get('/buscar', [RecetaController::class, 'buscar'])->name('recetas.buscar');