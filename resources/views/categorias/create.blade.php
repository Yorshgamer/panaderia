@extends('adminlte::page')

@section('title', 'Crear Categoría')

@section('content_header')
    <h1>Crear Nueva Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imagen_url">Imagen:</label>
                    <input type="file" name="imagen_url" id="imagen_url" class="form-control">
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destacado">Destacado:</label>
                    <input type="checkbox" name="destacado" id="destacado" value="1" {{ old('destacado') ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <label for="popularidad">Popularidad:</label>
                    <input type="number" name="popularidad" id="popularidad" class="form-control" value="{{ old('popularidad') }}">
                </div>
                <div class="form-group">
                    <label for="codigo_categoria">Código de Categoría:</label>
                    <input type="text" name="codigo_categoria" id="codigo_categoria" class="form-control" value="{{ old('codigo_categoria') }}">
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" id="observaciones" class="form-control">{{ old('observaciones') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Crear Categoría</button>
            </form>
        </div>
    </div>
@stop
