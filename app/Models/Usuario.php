<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   $table->id(); 
   $table->string('nombre', 150); 
   $table->string('apellido', 150)->nullable(); 
   $table->string('dni', 20)->unique(); 
   $table->string('email', 150)->unique();
   $table->string('direccion', 150)->nullable(); 
   $table->string('ciudad', 150); 
   $table->string('provincia', 150); 
   $table->string('codigo_postal', 10); 
   $table->string('telefono', 20)->nullable();
   $table->string('password', 250); 
   $table->boolean('activo')->default(true);
 
   $table->timestamps(); // Agregado
}
