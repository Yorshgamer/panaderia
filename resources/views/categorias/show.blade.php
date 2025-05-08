@extends('adminlte::page')

@section('title', 'Ver Categoría')

@section('content_header')
    <h1>Detalle de Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
            <p><strong>Tipo:</strong> {{ $categoria->tipo }}</p>
            <p><strong>Estado:</strong> {{ $categoria->estado }}</p>
            <p><strong>Popularidad:</strong> {{ $categoria->popularidad }}</p>
            <p><strong>Destacado:</strong> {{ $categoria->destacado ? 'Sí' : 'No' }}</p>
            <p><strong>Código de Categoría:</strong> {{ $categoria->codigo_categoria }}</p>
            <p><strong>Orden:</strong> {{ $categoria->orden }}</p>
            <p><strong>Observaciones:</strong> {{ $categoria->observaciones }}</p>
        </div>
    </div>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver</a>
@stop
