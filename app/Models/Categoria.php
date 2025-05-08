<?php

namespace App\Models;

use App\Models\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /** @use HasFactory<\Database\Factories\Models\CategoriaFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'fecha_creacion',
        'imagen_url',
        'popularidad',
        'destacado',
        'estado',
        'codigo_categoria',
        'orden',
        'observaciones',
    ];

    // Relación con productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
