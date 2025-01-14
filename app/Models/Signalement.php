<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Signalement extends Model
{
    use HasFactory;

    protected $table = 'signalements';

    protected $fillable = [
        'utilisateur_id',
        'description',
        'photo_url',
        'categorie',
        'statut',
        'latitude',
        'longitude',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function collecte()
    {
        return $this->hasOne(Collecte::class);
    }
}