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
        Schema::create('productos_ingredientes', function (Blueprint $table) {
            $table->id();
    $table->foreignId('producto_id')->constrained('productos')->cascadeOnDelete();
    $table->foreignId('ingrediente_id')->constrained('ingredientes')->cascadeOnDelete();
    $table->decimal('cantidad', 10, 2);
    $table->string('unidad', 20)->nullable();
    $table->integer('orden_preparacion')->nullable();
    $table->enum('tipo_uso', ['base', 'decoración', 'relleno'])->nullable();
    $table->integer('tiempo_aplicacion')->nullable(); // en minutos
    $table->boolean('es_opcional')->default(false);
    $table->text('observaciones')->nullable();
    $table->string('creado_por', 50)->nullable();
    $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_ingredientes');
    }
};
