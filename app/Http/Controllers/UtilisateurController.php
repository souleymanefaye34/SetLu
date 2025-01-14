<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Signalement;
use App\Models\Collecte;
use App\Models\Recompense;
use App\Models\UtilisateurRecompense;
use App\Models\Notification;
use App\Models\Parametre;


class UtilisateurController extends Controller
{
    // Créer un utilisateur
    public function creerUtilisateur(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:6',
            'numero_telephone' => 'nullable|string|max:15',
            'role' => 'in:citoyen,collecteur,admin'
        ]);

        $validated['mot_de_passe'] = bcrypt($validated['mot_de_passe']);
        $utilisateur = Utilisateur::create($validated);

        return response()->json($utilisateur, 201);
    }

    // Mettre à jour les informations d'un utilisateur
    public function mettreAJourUtilisateur(Request $request, $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'string|max:100',
            'email' => 'string|email|max:100|unique:utilisateurs,email,' . $id,
            'mot_de_passe' => 'nullable|string|min:6',
            'numero_telephone' => 'nullable|string|max:15',
            'role' => 'in:citoyen,collecteur,admin',
            'points' => 'integer|min:0'
        ]);

        if (isset($validated['mot_de_passe'])) {
            $validated['mot_de_passe'] = bcrypt($validated['mot_de_passe']);
        }

        $utilisateur->update($validated);
        return response()->json($utilisateur);
    }

    // Supprimer un utilisateur
    public function supprimerUtilisateur($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès.']);
    }

    // Lister tous les utilisateurs
    public function listerUtilisateurs()
    {
        $utilisateurs = Utilisateur::all();
        return response()->json($utilisateurs);
    }
}