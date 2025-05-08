<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalles = DetalleVenta::with(['venta', 'producto'])->latest()->paginate(10);
        return view('detalle_venta.index', compact('detalles'));
    }

    public function create()
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_venta.create', compact('ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'descuento_item' => 'nullable|numeric|min:0',
            'tipo_presentacion' => 'nullable|string|max:50',
            'codigo_item' => 'nullable|string|max:30',
            'observaciones' => 'nullable|string',
        ]);

        $descuento = $request->descuento_item ?? 0;
        $subtotal = ($request->cantidad * $request->precio_unitario) - $descuento;

        DetalleVenta::create([
            'venta_id' => $request->venta_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'subtotal' => $subtotal,
            'descripcion' => $request->descripcion,
            'descuento_item' => $descuento,
            'tipo_presentacion' => $request->tipo_presentacion,
            'codigo_item' => $request->codigo_item,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('detalle_venta.index')->with('success', 'Detalle de venta registrado correctamente.');
    }

    public function show(DetalleVenta $detalle_ventum)
    {
        return view('detalle_venta.show', compact('detalle_ventum'));
    }

    public function edit(DetalleVenta $detalle_ventum)
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_venta.edit', compact('detalle_ventum', 'ventas', 'productos'));
    }

    public function update(Request $request, DetalleVenta $detalle_ventum)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'descuento_item' => 'nullable|numeric|min:0',
            'tipo_presentacion' => 'nullable|string|max:50',
            'codigo_item' => 'nullable|string|max:30',
            'observaciones' => 'nullable|string',
        ]);

        $descuento = $request->descuento_item ?? 0;
        $subtotal = ($request->cantidad * $request->precio_unitario) - $descuento;

        $detalle_ventum->update([
            'venta_id' => $request->venta_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'subtotal' => $subtotal,
            'descripcion' => $request->descripcion,
            'descuento_item' => $descuento,
            'tipo_presentacion' => $request->tipo_presentacion,
            'codigo_item' => $request->codigo_item,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('detalle_venta.index')->with('success', 'Detalle de venta actualizado correctamente.');
    }

    public function destroy(DetalleVenta $detalle_ventum)
    {
        $detalle_ventum->delete();
        return redirect()->route('detalle_venta.index')->with('success', 'Detalle de venta eliminado correctamente.');
    }
}

