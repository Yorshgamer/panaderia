<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::with('categoria')->get();  // Relación con Categoria
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las categorías para el formulario de creación
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
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
            'precio' => 'required|decimal',
            'categoria_id' => 'required|exists:categorias,id',
            'stock' => 'required|integer',
            'imagen_url' => 'nullable|url',
            'peso' => 'nullable|decimal',
            'tiempo_preparacion' => 'nullable|integer',
            'estado' => 'required|in:activo,inactivo',
            'codigo_producto' => 'nullable|string|max:20',
        ]);

        // Crear el producto en la base de datos
        Producto::create($request->all());

        // Redirigir a la lista de productos con mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        // Mostrar los detalles de un producto específico
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // Obtener todas las categorías para el formulario de edición
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|decimal',
            'categoria_id' => 'required|exists:categorias,id',
            'stock' => 'required|integer',
            'imagen_url' => 'nullable|url',
            'peso' => 'nullable|decimal',
            'tiempo_preparacion' => 'nullable|integer',
            'estado' => 'required|in:activo,inactivo',
            'codigo_producto' => 'nullable|string|max:20',
        ]);

        // Actualizar el producto con los nuevos datos
        $producto->update($request->all());

        // Redirigir a la lista de productos con mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Eliminar el producto de la base de datos
        $producto->delete();

        // Redirigir a la lista de productos con mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
