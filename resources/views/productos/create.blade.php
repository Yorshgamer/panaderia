@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Crear Nuevo Producto</h1>
@stop

@section('content')
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" name="precio" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Categoría:</label>
            <select name="categoria_id" class="form-control">
                <option value="">Seleccionar Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Stock:</label>
            <input type="number" name="stock" class="form-control" value="0" required>
        </div>
        <div class="mb-3">
            <label>Imagen del Producto:</label>
            <input type="file" name="imagen_url" class="form-control">
        </div>
        <div class="mb-3">
            <label>Peso:</label>
            <input type="number" name="peso" class="form-control" step="0.01">
        </div>
        <div class="mb-3">
            <label>Tiempo de Preparación (en minutos):</label>
            <input type="number" name="tiempo_preparacion" class="form-control">
        </div>
        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Código de Producto:</label>
            <input type="text" name="codigo_producto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
