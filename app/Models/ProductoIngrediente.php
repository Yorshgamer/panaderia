<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoIngrediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id', 'ingrediente_id', 'cantidad', 'unidad', 
        'orden_preparacion', 'tipo_uso', 'tiempo_aplicacion', 'es_opcional', 
        'observaciones', 'creado_por', 'fecha_registro'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
