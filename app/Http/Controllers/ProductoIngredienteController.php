<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Producto;
use App\Models\ProductoIngrediente;
use Illuminate\Http\Request;

class ProductoIngredienteController extends Controller
{
    public function index(Producto $producto)
    {
        $ingredientes = $producto->productosIngredientes()->with('ingrediente')->get();
        return view('producto_ingredientes.index', compact('producto', 'ingredientes'));
    }

    public function create(Producto $producto)
    {
        $ingredientesDisponibles = Ingrediente::all();
        return view('producto_ingredientes.create', compact('producto', 'ingredientesDisponibles'));
    }

    public function store(Request $request, Producto $producto)
    {
        $request->validate([
            'ingrediente_id' => 'required|exists:ingredientes,id',
            'cantidad' => 'required|numeric|min:0.01',
            'unidad' => 'nullable|string|max:20',
            'orden_preparacion' => 'nullable|integer',
            'tipo_uso' => 'nullable|in:base,decoración,relleno',
            'tiempo_aplicacion' => 'nullable|integer',
            'es_opcional' => 'nullable|boolean',
            'observaciones' => 'nullable|string',
            'creado_por' => 'nullable|string|max:50',
        ]);

        ProductoIngrediente::create([
            'producto_id' => $producto->id,
            'ingrediente_id' => $request->ingrediente_id,
            'cantidad' => $request->cantidad,
            'unidad' => $request->unidad,
            'orden_preparacion' => $request->orden_preparacion,
            'tipo_uso' => $request->tipo_uso,
            'tiempo_aplicacion' => $request->tiempo_aplicacion,
            'es_opcional' => $request->es_opcional ?? false,
            'observaciones' => $request->observaciones,
            'creado_por' => $request->creado_por ?? auth()->user()->name ?? 'sistema',
        ]);

        return redirect()->route('productos.ingredientes.index', $producto)
                         ->with('success', 'Ingrediente agregado al producto.');
    }

    public function show(Producto $producto, ProductoIngrediente $ingrediente)
    {
        return view('producto_ingredientes.show', compact('producto', 'ingrediente'));
    }

    public function edit(Producto $producto, ProductoIngrediente $ingrediente)
    {
        $ingredientesDisponibles = Ingrediente::all();
        return view('producto_ingredientes.edit', compact('producto', 'ingrediente', 'ingredientesDisponibles'));
    }

    public function update(Request $request, Producto $producto, ProductoIngrediente $ingrediente)
    {
        $request->validate([
            'ingrediente_id' => 'required|exists:ingredientes,id',
            'cantidad' => 'required|numeric|min:0.01',
            'unidad' => 'nullable|string|max:20',
            'orden_preparacion' => 'nullable|integer',
            'tipo_uso' => 'nullable|in:base,decoración,relleno',
            'tiempo_aplicacion' => 'nullable|integer',
            'es_opcional' => 'nullable|boolean',
            'observaciones' => 'nullable|string',
        ]);

        $ingrediente->update([
            'ingrediente_id' => $request->ingrediente_id,
            'cantidad' => $request->cantidad,
            'unidad' => $request->unidad,
            'orden_preparacion' => $request->orden_preparacion,
            'tipo_uso' => $request->tipo_uso,
            'tiempo_aplicacion' => $request->tiempo_aplicacion,
            'es_opcional' => $request->es_opcional ?? false,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('productos.ingredientes.index', $producto)
                         ->with('success', 'Ingrediente actualizado correctamente.');
    }

    public function destroy(Producto $producto, ProductoIngrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()->route('productos.ingredientes.index', $producto)->with('success', 'Ingrediente eliminado del producto.');
    }
}
