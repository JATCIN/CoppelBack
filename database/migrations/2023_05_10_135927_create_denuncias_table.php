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
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresas_id')->constrained('empresas');
            $table->foreignId('paises_id')->constrained('paises');
            $table->foreignId('estados_id')->constrained('estados');
            $table->foreignId('usuarios_id')->constrained('usuarios');
            $table->text('detalle');
            $table->date('fecha');
            $table->string('contraseña');
            $table->string('folio', 5)->unique();
            $table->bigInteger('numero_centro');
            $table->string('comentarios')->nullable()->default('Pendiente');
            $table->string('estatus')->nullable()->default('Pendiente');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
