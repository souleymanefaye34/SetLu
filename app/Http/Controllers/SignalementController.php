<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signalement;

class SignalementController extends Controller
{
    // Créer un signalement
    public function creerSignalement(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'description' => 'nullable|string',
            'photo_url' => 'nullable|string',
            'categorie' => 'in:plastique,organique,general,encombrants',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        $signalement = Signalement::create($validated);
        return response()->json($signalement, 201);
    }

    // Mettre à jour un signalement
    public function mettreAJourSignalement(Request $request, $id)
    {
        $signalement = Signalement::findOrFail($id);

        $validated = $request->validate([
            'description' => 'nullable|string',
            'photo_url' => 'nullable|string',
            'categorie' => 'in:plastique,organique,general,encombrants',
            'statut' => 'in:en_attente,en_cours,collecte',
            'latitude' => 'numeric',
            'longitude' => 'numeric'
        ]);

        $signalement->update($validated);
        return response()->json($signalement);
    }

    // Supprimer un signalement
    public function supprimerSignalement($id)
    {
        $signalement = Signalement::findOrFail($id);
        $signalement->delete();

        return response()->json(['message' => 'Signalement supprimé avec succès.']);
    }

    // Lister tous les signalements
    public function listerSignalements()
    {
        $signalements = Signalement::all();
        return response()->json($signalements);
    }
}