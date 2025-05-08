@extends('adminlte::page')

@section('title', 'Editar Producto-Ingrediente')

@section('content_header')
    <h1>Editar Producto-Ingrediente</h1>
@stop

@section('content')
    <form action="{{ route('productos-ingredientes.update', $productoIngrediente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Producto:</label>
            <select name="producto_id" class="form-control" required>
                <option value="">Seleccionar Producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}" {{ $productoIngrediente->producto_id == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Ingrediente:</label>
            <select name="ingrediente_id" class="form-control" required>
                <option value="">Seleccionar Ingrediente</option>
                @foreach ($ingredientes as $ingrediente)
                    <option value="{{ $ingrediente->id }}" {{ $productoIngrediente->ingrediente_id == $ingrediente->id ? 'selected' : '' }}>{{ $ingrediente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" step="0.01" value="{{ $productoIngrediente->cantidad }}" required>
        </div>
        <div class="mb-3">
            <label>Unidad:</label>
            <input type="text" name="unidad" class="form-control" value="{{ $productoIngrediente->unidad }}">
        </div>
        <div class="mb-3">
            <label>Orden de Preparación:</label>
            <input type="number" name="orden_preparacion" class="form-control" value="{{ $productoIngrediente->orden_preparacion }}">
        </div>
        <div class="mb-3">
            <label>Tipo de Uso:</label>
            <select name="tipo_uso" class="form-control">
                <option value="base" {{ $productoIngrediente->tipo_uso == 'base' ? 'selected' : '' }}>Base</option>
                <option value="decoración" {{ $productoIngrediente->tipo_uso == 'decoración' ? 'selected' : '' }}>Decoración</option>
                <option value="relleno" {{ $productoIngrediente->tipo_uso == 'relleno' ? 'selected' : '' }}>Relleno</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tiempo de Aplicación (minutos):</label>
            <input type="number" name="tiempo_aplicacion" class="form-control" value="{{ $productoIngrediente->tiempo_aplicacion }}">
        </div>
        <div class="mb-3">
            <label>¿Es Opcional?</label>
            <select name="es_opcional" class="form-control">
                <option value="1" {{ $productoIngrediente->es_opcional ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$productoIngrediente->es_opcional ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control">{{ $productoIngrediente->observaciones }}</textarea>
        </div>
        <div class="mb-3">
            <label>Creado por:</label>
            <input type="text" name="creado_por" class="form-control" value="{{ $productoIngrediente->creado_por }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos-ingredientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
