@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    <form action="{{ route('categorias.update', $categoria) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <select name="tipo" class="form-control" required>
                <option value="pan" {{ $categoria->tipo == 'pan' ? 'selected' : '' }}>Pan</option>
                <option value="torta" {{ $categoria->tipo == 'torta' ? 'selected' : '' }}>Torta</option>
                <option value="galleta" {{ $categoria->tipo == 'galleta' ? 'selected' : '' }}>Galleta</option>
                <option value="queque" {{ $categoria->tipo == 'queque' ? 'selected' : '' }}>Queque</option>
                <option value="postre" {{ $categoria->tipo == 'postre' ? 'selected' : '' }}>Postre</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Imagen:</label>
            <input type="file" name="imagen_url" class="form-control">
        </div>
        <div class="mb-3">
            <label>Popularidad:</label>
            <input type="number" name="popularidad" class="form-control" value="{{ $categoria->popularidad }}">
        </div>
        <div class="mb-3">
            <label>Destacado:</label>
            <input type="checkbox" name="destacado" value="1" {{ $categoria->destacado ? 'checked' : '' }}>
        </div>
        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ $categoria->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $categoria->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Código de Categoría:</label>
            <input type="text" name="codigo_categoria" class="form-control" value="{{ $categoria->codigo_categoria }}">
        </div>
        <div class="mb-3">
            <label>Orden:</label>
            <input type="number" name="orden" class="form-control" value="{{ $categoria->orden }}">
        </div>
        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control">{{ $categoria->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
