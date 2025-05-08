@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imagen_url">Imagen:</label>
                    <input type="file" name="imagen_url" id="imagen_url" class="form-control">
                    @if ($categoria->imagen_url)
                        <div class="mt-2">
                            <img src="{{ asset($categoria->imagen_url) }}" alt="{{ $categoria->nombre }}" style="width: 100px; height: 100px;">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="activo" {{ old('estado', $categoria->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado', $categoria->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destacado">Destacado:</label>
                    <input type="checkbox" name="destacado" id="destacado" value="1" {{ old('destacado', $categoria->destacado) ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <label for="popularidad">Popularidad:</label>
                    <input type="number" name="popularidad" id="popularidad" class="form-control" value="{{ old('popularidad', $categoria->popularidad) }}">
                </div>
                <div class="form-group">
                    <label for="codigo_categoria">Código de Categoría:</label>
                    <input type="text" name="codigo_categoria" id="codigo_categoria" class="form-control" value="{{ old('codigo_categoria', $categoria->codigo_categoria) }}">
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" id="observaciones" class="form-control">{{ old('observaciones', $categoria->observaciones) }}</textarea>
                </div>
                <button type="submit" class="btn btn-warning">Actualizar Categoría</button>
            </form>
        </div>
    </div>
@stop
