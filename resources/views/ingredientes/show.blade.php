@extends('adminlte::page')

@section('title', 'Ver Ingrediente')

@section('content_header')
    <h1>Detalle del Ingrediente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $ingrediente->nombre }}</p>
            <p><strong>Unidad:</strong> {{ $ingrediente->unidad }}</p>
            <p><strong>Stock Actual:</strong> {{ $ingrediente->stock_actual }}</p>
            <p><strong>Stock Mínimo:</strong> {{ $ingrediente->stock_minimo }}</p>
            <p><strong>Proveedor:</strong> {{ $ingrediente->proveedor }}</p>
            <p><strong>Costo Unitario:</strong> {{ $ingrediente->costo_unitario }}</p>
            <p><strong>Fecha Último Ingreso:</strong> {{ $ingrediente->fecha_ultimo_ingreso }}</p>
            <p><strong>Ubicación en Almacén:</strong> {{ $ingrediente->ubicacion_almacen }}</p>
            <p><strong>Código de Barras:</strong> {{ $ingrediente->codigo_barras }}</p>
            <p><strong>Estado:</strong> {{ $ingrediente->estado }}</p>
            <p><strong>Observaciones:</strong> {{ $ingrediente->observaciones }}</p>
        </div>
    </div>
    <a href="{{ route('ingredientes.index') }}" class="btn btn-secondary">Volver</a>
@stop
