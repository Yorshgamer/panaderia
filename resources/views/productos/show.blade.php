@extends('adminlte::page')

@section('title', 'Ver Producto')

@section('content_header')
    <h1>Detalles del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset($producto->imagen_url) }}" class="img-fluid" alt="{{ $producto->nombre }}">
                </div>
                <div class="col-md-8">
                    <h4>{{ $producto->nombre }}</h4>
                    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin Categoría' }}</p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion ?? 'No disponible' }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                    <p><strong>Peso:</strong> {{ number_format($producto->peso, 2) }} kg</p>
                    <p><strong>Tiempo de Preparación:</strong> {{ $producto->tiempo_preparacion }} minutos</p>
                    <p><strong>Estado:</strong> {{ ucfirst($producto->estado) }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
