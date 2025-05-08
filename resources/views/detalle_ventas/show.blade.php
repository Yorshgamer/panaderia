<!-- resources/views/detalle_venta/show.blade.php -->

@extends('adminlte::page')

@section('title', 'Ver Detalle de Venta')

@section('content_header')
    <h1>Detalle de Venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Producto: {{ $detalle->producto->nombre }}</h3>
            <p><strong>Cantidad:</strong> {{ $detalle->cantidad }}</p>
            <p><strong>Precio Unitario:</strong> {{ number_format($detalle->precio_unitario, 2) }}</p>
            <p><strong>Subtotal:</strong> {{ number_format($detalle->subtotal, 2) }}</p>
            <p><strong>Descuento:</strong> {{ number_format($detalle->descuento_item, 2) }}</p>
            <p><strong>Tipo de Presentación:</strong> {{ $detalle->tipo_presentacion }}</p>
            <p><strong>Código Item:</strong> {{ $detalle->codigo_item }}</p>
            <p><strong>Observaciones:</strong> {{ $detalle->observaciones }}</p>
        </div>
    </div>
@stop
