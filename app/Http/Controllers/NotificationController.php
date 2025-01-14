<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Affiche toutes les notifications d'un utilisateur
    public function afficherNotificationsParUtilisateur($utilisateurId)
    {
        $notifications = Notification::where('utilisateur_id', $utilisateurId)->get();
        return response()->json($notifications, 200);
    }

    // Crée une nouvelle notification
    public function creerUneNotification(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'titre' => 'required|string|max:100',
            'message' => 'required|string',
            'est_lu' => 'boolean',
        ]);

        $notification = Notification::create($validated);
        return response()->json($notification, 201);
    }

    // Marque une notification comme lue
    public function marquerCommeLue($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['est_lu' => true]);

        return response()->json(['message' => 'Notification marquée comme lue'], 200);
    }

    // Supprime une notification
    public function supprimerUneNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json(['message' => 'Notification supprimée avec succès'], 200);
    }
}
