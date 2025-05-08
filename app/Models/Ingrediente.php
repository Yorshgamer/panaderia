<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    /** @use HasFactory<\Database\Factories\Models\IngredienteFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'unidad',
        'stock_actual',
        'stock_minimo',
        'proveedor',
        'costo_unitario',
        'fecha_ultimo_ingreso',
        'ubicacion_almacen',
        'codigo_barras',
        'estado',
        'observaciones',
    ];

    // Relación con productos
    public function productosIngredientes()
    {
        return $this->hasMany(ProductoIngrediente::class);
    }
}
