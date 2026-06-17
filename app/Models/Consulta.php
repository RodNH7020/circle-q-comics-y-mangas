<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Consulta extends Model
{
    protected $fillable = [
        'user_id',
        'nombre',
        'email',
        'mensaje',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}