<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collecte extends Model
{
    use HasFactory;

    protected $table = 'collectes';

    protected $fillable = [
        'signalement_id',
        'collecteur_id',
        'date_collecte',
        'statut',
    ];

    public function signalement()
    {
        return $this->belongsTo(Signalement::class);
    }

    public function collecteur()
    {
        return $this->belongsTo(Utilisateur::class, 'collecteur_id');
    }
}

