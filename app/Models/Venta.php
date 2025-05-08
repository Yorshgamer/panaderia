<?php

namespace App\Models;

use App\Models\DetalleVenta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'fecha', 'total', 'tipo_pago', 'numero_comprobante', 
        'igv', 'descuento', 'estado', 'observaciones', 'forma_entrega'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_venta')
            ->withPivot('cantidad', 'precio_unitario', 'subtotal', 'descuento_item', 'tipo_presentacion', 'codigo_item', 'observaciones');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}