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
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
    $table->string('nombre');
    $table->string('unidad', 20)->nullable(); // gramos, litros, etc.
    $table->decimal('stock_actual', 10, 2)->nullable();
    $table->decimal('stock_minimo', 10, 2)->nullable();
    $table->string('proveedor')->nullable();
    $table->decimal('costo_unitario', 10, 2)->nullable();
    $table->date('fecha_ultimo_ingreso')->nullable();
    $table->string('ubicacion_almacen')->nullable();
    $table->string('codigo_barras', 30)->nullable();
    $table->enum('estado', ['activo', 'inactivo'])->default('activo');
    $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
