<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = User::all();
        $productos = Producto::where('estado', 'activo')->get();
        return view('ventas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
            'tipo_pago' => 'required|in:efectivo,tarjeta,yape,plin,otro',
            'numero_comprobante' => 'nullable|string|max:50',
            'igv' => 'nullable|numeric',
            'descuento' => 'nullable|numeric',
            'estado' => 'required|in:completado,pendiente,cancelado',
            'observaciones' => 'nullable|string',
            'forma_entrega' => 'nullable|in:recojo,delivery',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
            'productos.*.subtotal' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $venta = Venta::create($request->only([
                'user_id', 'fecha', 'total', 'tipo_pago', 'numero_comprobante',
                'igv', 'descuento', 'estado', 'observaciones', 'forma_entrega'
            ]));

            foreach ($request->productos as $item) {
                $venta->productos()->attach($item['id'], [
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'subtotal' => $item['subtotal'],
                    'descuento_item' => $item['descuento_item'] ?? 0,
                    'tipo_presentacion' => $item['tipo_presentacion'] ?? null,
                    'codigo_item' => $item['codigo_item'] ?? null,
                    'observaciones' => $item['observaciones'] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error al registrar la venta: ' . $e->getMessage());
        }
    }

    public function show(Venta $venta)
    {
        $venta->load('cliente', 'productos');
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = User::all();
        $productos = Producto::where('estado', 'activo')->get();
        $venta->load('productos');
        return view('ventas.edit', compact('venta', 'clientes', 'productos'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
            'tipo_pago' => 'required|in:efectivo,tarjeta,yape,plin,otro',
            'numero_comprobante' => 'nullable|string|max:50',
            'igv' => 'nullable|numeric',
            'descuento' => 'nullable|numeric',
            'estado' => 'required|in:completado,pendiente,cancelado',
            'observaciones' => 'nullable|string',
            'forma_entrega' => 'nullable|in:recojo,delivery',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
            'productos.*.subtotal' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $venta->update($request->only([
                'user_id', 'fecha', 'total', 'tipo_pago', 'numero_comprobante',
                'igv', 'descuento', 'estado', 'observaciones', 'forma_entrega'
            ]));

            // Eliminar los productos anteriores
            $venta->productos()->detach();

            // Volver a registrar los productos
            foreach ($request->productos as $item) {
                $venta->productos()->attach($item['id'], [
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'subtotal' => $item['subtotal'],
                    'descuento_item' => $item['descuento_item'] ?? 0,
                    'tipo_presentacion' => $item['tipo_presentacion'] ?? null,
                    'codigo_item' => $item['codigo_item'] ?? null,
                    'observaciones' => $item['observaciones'] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error al actualizar la venta: ' . $e->getMessage());
        }
    }

    public function destroy(Venta $venta)
    {
        $venta->productos()->detach(); // Limpiar tabla pivote
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}
