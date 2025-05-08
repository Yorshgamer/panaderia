@extends('adminlte::page')

@section('title', 'Crear Producto-Ingrediente')

@section('content_header')
    <h1>Crear Nuevo Producto-Ingrediente</h1>
@stop

@section('content')
    <form action="{{ route('productos-ingredientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Producto:</label>
            <select name="producto_id" class="form-control" required>
                <option value="">Seleccionar Producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Ingrediente:</label>
            <select name="ingrediente_id" class="form-control" required>
                <option value="">Seleccionar Ingrediente</option>
                @foreach ($ingredientes as $ingrediente)
                    <option value="{{ $ingrediente->id }}">{{ $ingrediente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Unidad:</label>
            <input type="text" name="unidad" class="form-control">
        </div>
        <div class="mb-3">
            <label>Orden de Preparación:</label>
            <input type="number" name="orden_preparacion" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tipo de Uso:</label>
            <select name="tipo_uso" class="form-control">
                <option value="base">Base</option>
                <option value="decoración">Decoración</option>
                <option value="relleno">Relleno</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tiempo de Aplicación (minutos):</label>
            <input type="number" name="tiempo_aplicacion" class="form-control">
        </div>
        <div class="mb-3">
            <label>¿Es Opcional?</label>
            <select name="es_opcional" class="form-control">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Creado por:</label>
            <input type="text" name="creado_por" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('productos-ingredientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
