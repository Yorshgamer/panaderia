<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();
        return view('ingredientes.index', compact('ingredientes'));
    }

    public function create()
    {
        return view('ingredientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'unidad' => 'nullable|string|max:20',
            'stock_actual' => 'nullable|numeric|min:0',
            'stock_minimo' => 'nullable|numeric|min:0',
            'proveedor' => 'nullable|string|max:100',
            'costo_unitario' => 'nullable|numeric|min:0',
            'fecha_ultimo_ingreso' => 'nullable|date',
            'ubicacion_almacen' => 'nullable|string|max:100',
            'codigo_barras' => 'nullable|string|max:30',
            'estado' => 'nullable|in:activo,inactivo',
            'observaciones' => 'nullable|string',
        ]);

        Ingrediente::create($request->all());

        return redirect()->route('ingredientes.index')->with('success', 'Ingrediente creado correctamente.');
    }

    public function show(Ingrediente $ingrediente)
    {
        return view('ingredientes.show', compact('ingrediente'));
    }

    public function edit(Ingrediente $ingrediente)
    {
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, Ingrediente $ingrediente)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'unidad' => 'nullable|string|max:20',
            'stock_actual' => 'nullable|numeric|min:0',
            'stock_minimo' => 'nullable|numeric|min:0',
            'proveedor' => 'nullable|string|max:100',
            'costo_unitario' => 'nullable|numeric|min:0',
            'fecha_ultimo_ingreso' => 'nullable|date',
            'ubicacion_almacen' => 'nullable|string|max:100',
            'codigo_barras' => 'nullable|string|max:30',
            'estado' => 'nullable|in:activo,inactivo',
            'observaciones' => 'nullable|string',
        ]);

        $ingrediente->update($request->all());
        return redirect()->route('ingredientes.index')->with('success', 'Ingrediente actualizado correctamente.');
    }

    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()->route('ingredientes.index')->with('success', 'Ingrediente eliminado.');
    }
}
