<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'numero_telephone',
        'role',
        'points',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    public function signalements()
    {
        return $this->hasMany(Signalement::class);
    }
    public function recompenses()
    {
        return $this->belongsToMany(Recompense::class, 'utilisateur_recompenses')->withTimestamps();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}