<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UEController;
use App\Http\Controllers\ECController;
use App\Http\Controllers\NoteController;

// Route pour la page d'accueil
Route::get('/', function () {
    return Inertia::render('Welcome'); 
});
Route::get('/', function () {
    return Inertia::render('Home');
});

// Ressources pour les unités d'enseignement
Route::resource('ues', UEController::class);

// Ressources pour les éléments constitutifs
Route::resource('ecs', ECController::class);

Route::resource('notes', NoteController::class);
