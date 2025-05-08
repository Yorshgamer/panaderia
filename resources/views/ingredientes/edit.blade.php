@extends('adminlte::page')

@section('title', 'Editar Ingrediente')

@section('content_header')
    <h1>Editar Ingrediente</h1>
@stop

@section('content')
    <form action="{{ route('ingredientes.update', $ingrediente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $ingrediente->nombre }}" required>
        </div>
        <div class="mb-3">
            <label>Unidad:</label>
            <input type="text" name="unidad" class="form-control" value="{{ $ingrediente->unidad }}">
        </div>
        <div class="mb-3">
            <label>Stock Actual:</label>
            <input type="number" name="stock_actual" class="form-control" value="{{ $ingrediente->stock_actual }}" step="0.01">
        </div>
        <div class="mb-3">
            <label>Stock Mínimo:</label>
            <input type="number" name="stock_minimo" class="form-control" value="{{ $ingrediente->stock_minimo }}" step="0.01">
        </div>
        <div class="mb-3">
            <label>Proveedor:</label>
            <input type="text" name="proveedor" class="form-control" value="{{ $ingrediente->proveedor }}">
        </div>
        <div class="mb-3">
            <label>Costo Unitario:</label>
            <input type="number" name="costo_unitario" class="form-control" value="{{ $ingrediente->costo_unitario }}" step="0.01">
        </div>
        <div class="mb-3">
            <label>Fecha Último Ingreso:</label>
            <input type="date" name="fecha_ultimo_ingreso" class="form-control" value="{{ $ingrediente->fecha_ultimo_ingreso }}">
        </div>
        <div class="mb-3">
            <label>Ubicación en Almacén:</label>
            <input type="text" name="ubicacion_almacen" class="form-control" value="{{ $ingrediente->ubicacion_almacen }}">
        </div>
        <div class="mb-3">
            <label>Código de Barras:</label>
            <input type="text" name="codigo_barras" class="form-control" value="{{ $ingrediente->codigo_barras }}">
        </div>
        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ $ingrediente->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $ingrediente->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control">{{ $ingrediente->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('ingredientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
