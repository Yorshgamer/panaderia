<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las categorías
        $categorias = Categoria::all();
        // Retornar vista con las categorías
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear una nueva categoría
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:pan,torta,galleta,queque,postre',
            'imagen_url' => 'nullable|url',
            'popularidad' => 'nullable|integer|min:0',
            'destacado' => 'nullable|boolean',
            'estado' => 'required|in:activo,inactivo',
            'codigo_categoria' => 'nullable|string|max:20',
            'orden' => 'nullable|integer',
            'observaciones' => 'nullable|string',
        ]);
    
        $data = $request->all();
        $data['destacado'] = $request->has('destacado');
    
        Categoria::create($data);

        // Redirigir a la lista de categorías con mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        // Mostrar los detalles de una categoría específica
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        // Mostrar el formulario para editar una categoría específica
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:pan,torta,galleta,queque,postre',
            'imagen_url' => 'nullable|url',
            'popularidad' => 'nullable|integer|min:0',
            'destacado' => 'nullable|boolean',
            'estado' => 'required|in:activo,inactivo',
            'codigo_categoria' => 'nullable|string|max:20',
            'orden' => 'nullable|integer',
            'observaciones' => 'nullable|string',
        ]);
    
        $data = $request->all();
        $data['destacado'] = $request->has('destacado');
    
        $categoria->update($data);
        // Redirigir a la lista de categorías con mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        // Eliminar la categoría de la base de datos
        $categoria->delete();

        // Redirigir a la lista de categorías con mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
