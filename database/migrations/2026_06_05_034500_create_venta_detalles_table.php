<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas_detalle', function (Blueprint $table) {
            $table->id();
            // Asegúrate que estos nombres de tabla existan exactamente así en tu BD:
            $table->foreignId('venta_id')->constrained('ventas_cabecera')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos');
            
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas_detalle');
    }
};