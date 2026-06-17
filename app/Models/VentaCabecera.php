<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\VentaDetalle;

class VentaCabecera extends Model
{
    protected $table = 'ventas_cabecera';

    protected $fillable = [
        'user_id', 
        'estado', 
        'total', 
        'fecha_venta',
    ];

    protected $casts = [
        'fecha_venta' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalles()
{
    // Forzamos a Laravel a vincular 'venta_id' de la tabla detalle con el 'id' de la cabecera
    return $this->hasMany(VentaDetalle::class, 'venta_id', 'id');
}

}