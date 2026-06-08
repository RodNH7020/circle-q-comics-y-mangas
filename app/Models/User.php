<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Le indica a Laravel que use la tabla "usuarios"
    protected $table = 'usuarios';

   

    

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $fillable = [
    'nombre', 
    'apellido', 
    'email', 
    'password', 
    'telefono', 
    'provincia', 
    'ciudad', 
    'direccion', 
    'codigopostal', 
    'role', 
    'remember_token' 
];
}