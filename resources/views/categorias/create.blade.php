@extends('adminlte::page')

@section('title', 'Crear Categoría')

@section('content_header')
    <h1>Crear Nueva Categoría</h1>
@stop

@section('content')
    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <select name="tipo" class="form-control" required>
                <option value="pan">Pan</option>
                <option value="torta">Torta</option>
                <option value="galleta">Galleta</option>
                <option value="queque">Queque</option>
                <option value="postre">Postre</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Imagen:</label>
            <input type="file" name="imagen_url" class="form-control">
        </div>
        <div class="mb-3">
            <label>Popularidad:</label>
            <input type="number" name="popularidad" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Destacado:</label>
            <input type="checkbox" name="destacado" value="1">
        </div>
        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Código de Categoría:</label>
            <input type="text" name="codigo_categoria" class="form-control">
        </div>
        <div class="mb-3">
            <label>Orden:</label>
            <input type="number" name="orden" class="form-control">
        </div>
        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
