@extends('adminlte::page')

@section('title', 'Ver Producto')

@section('content_header')
    <h1>Detalle del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria ? $producto->categoria->nombre : 'No asignada' }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <p><strong>Peso:</strong> {{ $producto->peso }}</p>
            <p><strong>Tiempo de Preparación:</strong> {{ $producto->tiempo_preparacion }} minutos</p>
            <p><strong>Estado:</strong> {{ $producto->estado }}</p>
            <p><strong>Código de Producto:</strong> {{ $producto->codigo_producto }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $producto->fecha_creacion }}</p>
            @if ($producto->imagen_url)
                <p><strong>Imagen del Producto:</strong><br><img src="{{ asset('storage/' . $producto->imagen_url) }}" width="200"></p>
            @endif
        </div>
    </div>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@stop
