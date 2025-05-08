<!-- resources/views/categorias/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
    <a href="{{ route('categorias.create') }}" class="btn btn-success mb-3">Crear nueva categoría</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        @if ($categoria->imagen_url)
                            <img src="{{ asset($categoria->imagen_url) }}" alt="{{ $categoria->nombre }}" width="50">
                        @else
                            <span>No disponible</span>
                        @endif
                    </td>
                    <td>{{ $categoria->estado }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
