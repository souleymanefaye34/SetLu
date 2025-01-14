<?php

namespace App\Http\Controllers;

use App\Models\Recompense;
use Illuminate\Http\Request;

class RecompenseController extends Controller
{
    // Affiche toutes les récompenses
    public function afficherToutesLesRecompenses()
    {
        $recompenses = Recompense::all();
        return response()->json($recompenses, 200);
    }

    // Crée une nouvelle récompense
    public function creerUneRecompense(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'description' => 'nullable|string',
            'points_requis' => 'required|integer|min:0',
        ]);

        $recompense = Recompense::create($validated);
        return response()->json($recompense, 201);
    }

    // Met à jour une récompense
    public function mettreAJourUneRecompense(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'description' => 'nullable|string',
            'points_requis' => 'required|integer|min:0',
        ]);

        $recompense = Recompense::findOrFail($id);
        $recompense->update($validated);

        return response()->json(['message' => 'Récompense mise à jour avec succès'], 200);
    }

    // Supprime une récompense
    public function supprimerUneRecompense($id)
    {
        $recompense = Recompense::findOrFail($id);
        $recompense->delete();

        return response()->json(['message' => 'Récompense supprimée avec succès'], 200);
    }
}
