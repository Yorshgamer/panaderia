@extends('adminlte::page')

@section('title', 'Crear Ingrediente')

@section('content_header')
    <h1>Crear Nuevo Ingrediente</h1>
@stop

@section('content')
    <form action="{{ route('ingredientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Unidad:</label>
            <input type="text" name="unidad" class="form-control">
        </div>
        <div class="mb-3">
            <label>Stock Actual:</label>
            <input type="number" name="stock_actual" class="form-control" step="0.01">
        </div>
        <div class="mb-3">
            <label>Stock Mínimo:</label>
            <input type="number" name="stock_minimo" class="form-control" step="0.01">
        </div>
        <div class="mb-3">
            <label>Proveedor:</label>
            <input type="text" name="proveedor" class="form-control">
        </div>
        <div class="mb-3">
            <label>Costo Unitario:</label>
            <input type="number" name="costo_unitario" class="form-control" step="0.01">
        </div>
        <div class="mb-3">
            <label>Fecha Último Ingreso:</label>
            <input type="date" name="fecha_ultimo_ingreso" class="form-control">
        </div>
        <div class="mb-3">
            <label>Ubicación en Almacén:</label>
            <input type="text" name="ubicacion_almacen" class="form-control">
        </div>
        <div class="mb-3">
            <label>Código de Barras:</label>
            <input type="text" name="codigo_barras" class="form-control">
        </div>
        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('ingredientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
