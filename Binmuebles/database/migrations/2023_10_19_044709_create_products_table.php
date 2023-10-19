<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('tipo', ['Casa', 'Lote', 'Edificio']); 
            $table->string('imagen');
            $table->enum('estado', ['Alquiler', 'venta']); 
            $table->string('ubicacion_general');
            $table->string('disponibilidad');
            $table->string('precio_venta', 30, 2)->nullable(); 
            $table->string('precio_alquiler', 30, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
