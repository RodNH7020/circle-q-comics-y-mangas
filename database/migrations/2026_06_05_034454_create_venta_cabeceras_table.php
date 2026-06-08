<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas_cabecera', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_venta')->nullable();
            
            // MODIFICA ESTA LÍNEA: Cambiamos 'users' por 'usuarios'
            $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade');
            
            $table->string('estado')->default('carrito'); 
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas_cabecera');
    }
};