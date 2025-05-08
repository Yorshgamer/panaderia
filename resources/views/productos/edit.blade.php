@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" name="precio" class="form-control" value="{{ $producto->precio }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Categoría:</label>
            <select name="categoria_id" class="form-control">
                <option value="">Seleccionar Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Stock:</label>
            <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
        </div>
        <div class="mb-3">
            <label>Imagen del Producto:</label>
            <input type="file" name="imagen_url" class="form-control">
            @if ($producto->imagen_url)
                <img src="{{ asset('storage/' . $producto->imagen_url) }}" alt="Imagen del Producto" class="mt-2" width="100">
            @endif
        </div>
        <div class="mb-3">
            <label>Peso:</label>
            <input type="number" name="peso" class="form-control" value="{{ $producto->peso }}" step="0.01">
        </div>
        <div class="mb-3">
            <label>Tiempo de Preparación:</label>
            <input type="number" name="tiempo_preparacion" class="form-control" value="{{ $producto->tiempo_preparacion }}">
        </div>
        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ $producto->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $producto->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Código de Producto:</label>
            <input type="text" name="codigo_producto" class="form-control" value="{{ $producto->codigo_producto }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
