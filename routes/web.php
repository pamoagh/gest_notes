<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UEController;
use App\Http\Controllers\ECController;

// Route pour la page d'accueil
Route::get('/', function () {
    return Inertia::render('Welcome'); // Vérifie que le composant React "Welcome" existe
});

// Ressources pour les unités d'enseignement
Route::resource('ues', UEController::class);

// Ressources pour les éléments constitutifs
Route::resource('ecs', ECController::class);
