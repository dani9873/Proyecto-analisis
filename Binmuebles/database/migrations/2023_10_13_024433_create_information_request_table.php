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
        Schema::create('information_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien_inmueble_id'); // Clave foránea
            $table->foreign('bien_inmueble_id')->references('id')->on('bienes_inmuebles');
            $table->unsignedBigInteger('usuario_id'); // Clave foránea
            $table->foreign('usuario_id')->references('id')->on('usuarios_registrados');
            $table->text('mensaje'); // Mensaje de solicitud
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_request');
    }
};
