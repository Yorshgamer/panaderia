@extends('adminlte::page')

@section('title', 'Detalle de Categoría')

@section('content_header')
    <h1>Detalle de la Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning float-right">Editar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Imagen:</h4>
                    @if ($categoria->imagen_url)
                        <img src="{{ asset($categoria->imagen_url) }}" alt="{{ $categoria->nombre }}" class="img-fluid" style="max-height: 250px; object-fit: cover;">
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h4>Nombre:</h4>
                    <p>{{ $categoria->nombre }}</p>

                    <h4>Descripción:</h4>
                    <p>{{ $categoria->descripcion }}</p>

                    <h4>Popularidad:</h4>
                    <p>{{ $categoria->popularidad }}</p>

                    <h4>Estado:</h4>
                    <p>{{ $categoria->estado }}</p>

                    <h4>Código de Categoría:</h4>
                    <p>{{ $categoria->codigo_categoria ?? 'No disponible' }}</p>

                    <h4>Observaciones:</h4>
                    <p>{{ $categoria->observaciones ?? 'No disponible' }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
