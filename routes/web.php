<?php

use App\Http\Controllers\AssureurController;
use App\Http\Controllers\ChampController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ReponseController;
use Illuminate\Support\Facades\Route;

Route::get('/tarifs',[ProductionController::class,'index'])->name('tarifs.index');
//Route pour afficher une offre spécifique
Route::get('/tarifs/create',[ProductionController::class,'create'])->name('tarifs.create');
Route::post('/tarifs/store',[ProductionController::class,'store'])->name('tarifs.store');
Route::post('/tarifs/{id}/update', [ProductionController::class, 'update'])->name('tarifs.update');
// Route pour afficher le formulaire de modification
Route::get('/tarifs/{id}/edit', [ProductionController::class, 'edit'])->name('tarifs.edit');

//Route pour afficher le formulaire deréation de champc
Route::get('/offres/{offreId}/champs',[ChampController::class,'create'])->name('champ.create');

Route::get('/offres',[OffreController::class,'index'])->name('offres.index');
//Route pour afficher une offre spécifique
Route::get('/offres/{offreId}',[OffreController::class,'show'])->name('offres.show');

//Route pour ajouter un nouveau champ à une offre
Route::post('/offres/{offreId}/champs',[ChampController::class,'store'])->name('champ.store');

//ROUTE POUR AFFICHER LES CHAMPS ASSOCIE A UNE OFFRE POUR UN ASSUREUR
Route::get('/offres/{offreId}/repondre',[AssureurController::class, 'showForm'])->name('offres.repondre');
//Route pour soummettre les réponses de l'assureur
Route::post('/offres/{offre}/reponses',[ReponseController::class, 'store'])->name('reponses.store');

Route::get('/reponse/{id}',[ReponseController::class, 'edit'])->name('offres.edit');
Route::put('/edit/reponse/{id}',[ReponseController::class, 'update'])->name('offres.update');
Route::get('reponses', [OffreController::class, 'liste'])->name('offres.liste');