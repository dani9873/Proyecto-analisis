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
        Schema::create('real_estate', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('tipo'); 
            $table->enum('estado', ['alquiler', 'venta']); 
            $table->string('ubicacion_general');
            $table->string('disponibilidad');
            $table->float('precio_venta', 10, 2)->nullable(); 
            $table->float('precio_alquiler', 10, 2)->nullable(); 
            $table->unsignedBigInteger('comisionista_id'); 
            $table->foreign('comisionista_id')->references('id')->on('comisionistas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate');
    }
};