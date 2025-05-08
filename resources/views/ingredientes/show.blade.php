@extends('adminlte::page')

@section('title', 'Detalles del Ingrediente')

@section('content_header')
    <h1>Detalles del Ingrediente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{ $ingrediente->nombre }}</h4>
                    <p><strong>Unidad:</strong> {{ $ingrediente->unidad ?? 'No disponible' }}</p>
                    <p><strong>Stock Actual:</strong> {{ $ingrediente->stock_actual }}</p>
                    <p><strong>Stock Mínimo:</strong> {{ $ingrediente->stock_minimo }}</p>
                    <p><strong>Proveedor:</strong> {{ $ingrediente->proveedor ?? 'No disponible' }}</p>
                    <p><strong>Costo Unitario:</strong> ${{ number_format($ingrediente->costo_unitario, 2) }}</p>
                    <p><strong>Fecha Último Ingreso:</strong> {{ $ingrediente->fecha_ultimo_ingreso }}</p>
                    <p><strong>Ubicación Almacén:</strong> {{ $ingrediente->ubicacion_almacen ?? 'No disponible' }}</p>
                    <p><strong>Código de Barras:</strong> {{ $ingrediente->codigo_barras ?? 'No disponible' }}</p>
                    <p><strong>Estado:</strong> {{ ucfirst($ingrediente->estado) }}</p>
                    <p><strong>Observaciones:</strong> {{ $ingrediente->observaciones ?? 'No disponible' }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
