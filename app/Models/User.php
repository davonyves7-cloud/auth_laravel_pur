<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les champs autorisés pour l'inscription.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Les champs qui ne doivent pas être affichés.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion des données.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}