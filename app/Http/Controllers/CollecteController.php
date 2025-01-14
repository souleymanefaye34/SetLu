<?php



namespace App\Http\Controllers;

use App\Models\Collecte;
use App\Models\Signalement;
use Illuminate\Http\Request;

class CollecteController extends Controller
{
    // Affiche toutes les collectes
    public function afficherToutesLesCollectes()
    {
        $collectes = Collecte::with(['signalement', 'collecteur'])->get();
        return response()->json($collectes, 200);
    }

    // Crée une nouvelle collecte
    public function creerUneCollecte(Request $request)
    {
        $validated = $request->validate([
            'signalement_id' => 'required|exists:signalements,id',
            'collecteur_id' => 'required|exists:utilisateurs,id',
            'date_collecte' => 'required|date',
            'statut' => 'required|in:terminee,echec',
        ]);

        $collecte = Collecte::create($validated);
        Signalement::where('id', $validated['signalement_id'])->update(['statut' => 'collecte']);

        return response()->json($collecte, 201);
    }

    // Met à jour une collecte
    public function mettreAJourUneCollecte(Request $request, $id)
    {
        $validated = $request->validate([
            'statut' => 'required|in:terminee,echec',
        ]);

        $collecte = Collecte::findOrFail($id);
        $collecte->update($validated);

        return response()->json(['message' => 'Collecte mise à jour avec succès'], 200);
    }

    // Supprime une collecte
    public function supprimerUneCollecte($id)
    {
        $collecte = Collecte::findOrFail($id);
        $collecte->delete();

        return response()->json(['message' => 'Collecte supprimée avec succès'], 200);
    }
}

