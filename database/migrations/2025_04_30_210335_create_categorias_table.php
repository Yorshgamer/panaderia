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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
    $table->string('nombre');
    $table->text('descripcion')->nullable();
    $table->enum('tipo', ['pan', 'torta', 'galleta', 'queque', 'postre']);
    $table->timestamp('fecha_creacion')->useCurrent();
    $table->string('imagen_url')->nullable();
    $table->integer('popularidad')->default(0);
    $table->boolean('destacado')->default(false);
    $table->enum('estado', ['activo', 'inactivo'])->default('activo');
    $table->string('codigo_categoria', 20)->nullable();
    $table->integer('orden')->nullable();
    $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
