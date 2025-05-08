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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // cliente
            $table->dateTime('fecha')->useCurrent();
            $table->decimal('total', 10, 2);
            $table->enum('tipo_pago', ['efectivo', 'tarjeta', 'yape', 'plin', 'otro']);
            $table->string('numero_comprobante', 50)->nullable();
            $table->decimal('igv', 10, 2)->nullable();
            $table->decimal('descuento', 10, 2)->nullable();
            $table->enum('estado', ['completado', 'pendiente', 'cancelado']);
            $table->text('observaciones')->nullable();
            $table->enum('forma_entrega', ['recojo', 'delivery'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
