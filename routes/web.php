<?php

//use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\SignalementController;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\RecompenseController;
use App\Http\Controllers\NotificationController;

// Routes pour les utilisateurs
Route::prefix('utilisateurs')->group(function () {
    Route::get('/', [UtilisateurController::class, 'afficherTousLesUtilisateurs']); // GET: Liste tous les utilisateurs
    Route::post('/', [UtilisateurController::class, 'creerUnUtilisateur']); // POST: Crée un utilisateur
    Route::get('/{id}', [UtilisateurController::class, 'afficherUnUtilisateur']); // GET: Affiche un utilisateur spécifique
    Route::put('/{id}', [UtilisateurController::class, 'mettreAJourUnUtilisateur']); // PUT: Met à jour un utilisateur
    Route::delete('/{id}', [UtilisateurController::class, 'supprimerUnUtilisateur']); // DELETE: Supprime un utilisateur
});

// Routes pour les signalements
Route::prefix('signalements')->group(function () {
    Route::get('/', [SignalementController::class, 'afficherTousLesSignalements']); // GET: Liste tous les signalements
    Route::post('/', [SignalementController::class, 'creerUnSignalement']); // POST: Crée un signalement
    Route::get('/{id}', [SignalementController::class, 'afficherUnSignalement']); // GET: Affiche un signalement spécifique
    Route::put('/{id}', [SignalementController::class, 'mettreAJourUnSignalement']); // PUT: Met à jour un signalement
    Route::delete('/{id}', [SignalementController::class, 'supprimerUnSignalement']); // DELETE: Supprime un signalement
});

// Routes pour les collectes
Route::prefix('collectes')->group(function () {
    Route::get('/', [CollecteController::class, 'afficherToutesLesCollectes']); // GET: Liste toutes les collectes
    Route::post('/', [CollecteController::class, 'creerUneCollecte']); // POST: Crée une collecte
    Route::put('/{id}', [CollecteController::class, 'mettreAJourUneCollecte']); // PUT: Met à jour une collecte
    Route::delete('/{id}', [CollecteController::class, 'supprimerUneCollecte']); // DELETE: Supprime une collecte
});

// Routes pour les récompenses
Route::prefix('recompenses')->group(function () {
    Route::get('/', [RecompenseController::class, 'afficherToutesLesRecompenses']); // GET: Liste toutes les récompenses
    Route::post('/', [RecompenseController::class, 'creerUneRecompense']); // POST: Crée une récompense
    Route::put('/{id}', [RecompenseController::class, 'mettreAJourUneRecompense']); // PUT: Met à jour une récompense
    Route::delete('/{id}', [RecompenseController::class, 'supprimerUneRecompense']); // DELETE: Supprime une récompense
});

// Routes pour les notifications
Route::prefix('notifications')->group(function () {
    Route::get('/utilisateur/{utilisateurId}', [NotificationController::class, 'afficherNotificationsParUtilisateur']); // GET: Notifications par utilisateur
    Route::post('/', [NotificationController::class, 'creerUneNotification']); // POST: Crée une notification
    Route::put('/{id}/marquer-lue', [NotificationController::class, 'marquerCommeLue']); // PUT: Marque une notification comme lue
    Route::delete('/{id}', [NotificationController::class, 'supprimerUneNotification']); // DELETE: Supprime une notification
});

Route::get('/', function () {
    return view('welcome');
});
