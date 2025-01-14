<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'utilisateur_id',
        'titre',
        'message',
        'est_lu',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}