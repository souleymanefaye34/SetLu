<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Recompense extends Model
{
    use HasFactory;

    protected $table = 'recompenses';

    protected $fillable = [
        'nom',
        'description',
        'points_requis',
    ];

    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'utilisateur_recompenses')->withTimestamps();
    }
}
