@extends('adminlte::page')

@section('title', 'Crear Ingrediente')

@section('content_header')
    <h1>Crear Ingrediente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ingredientes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="unidad">Unidad</label>
                    <input type="text" name="unidad" id="unidad" class="form-control @error('unidad') is-invalid @enderror" value="{{ old('unidad') }}">
                    @error('unidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock_actual">Stock Actual</label>
                    <input type="number" name="stock_actual" id="stock_actual" class="form-control @error('stock_actual') is-invalid @enderror" value="{{ old('stock_actual') }}" step="0.01">
                    @error('stock_actual')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock_minimo">Stock Mínimo</label>
                    <input type="number" name="stock_minimo" id="stock_minimo" class="form-control @error('stock_minimo') is-invalid @enderror" value="{{ old('stock_minimo') }}" step="0.01">
                    @error('stock_minimo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" name="proveedor" id="proveedor" class="form-control @error('proveedor') is-invalid @enderror" value="{{ old('proveedor') }}">
                    @error('proveedor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="costo_unitario">Costo Unitario</label>
                    <input type="number" name="costo_unitario" id="costo_unitario" class="form-control @error('costo_unitario') is-invalid @enderror" value="{{ old('costo_unitario') }}" step="0.01">
                    @error('costo_unitario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_ultimo_ingreso">Fecha Último Ingreso</label>
                    <input type="date" name="fecha_ultimo_ingreso" id="fecha_ultimo_ingreso" class="form-control @error('fecha_ultimo_ingreso') is-invalid @enderror" value="{{ old('fecha_ultimo_ingreso') }}">
                    @error('fecha_ultimo_ingreso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ubicacion_almacen">Ubicación en Almacén</label>
                    <input type="text" name="ubicacion_almacen" id="ubicacion_almacen" class="form-control @error('ubicacion_almacen') is-invalid @enderror" value="{{ old('ubicacion_almacen') }}">
                    @error('ubicacion_almacen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="codigo_barras">Código de Barras</label>
                    <input type="text" name="codigo_barras" id="codigo_barras" class="form-control @error('codigo_barras') is-invalid @enderror" value="{{ old('codigo_barras') }}">
                    @error('codigo_barras')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                        <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control @error('observaciones') is-invalid @enderror">{{ old('observaciones') }}</textarea>
                    @error('observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Crear Ingrediente</button>
            </form>
        </div>
    </div>
@stop
