<!-- resources/views/detalle_venta/edit.blade.php -->

@extends('adminlte::page')

@section('title', 'Editar Detalle de Venta')

@section('content_header')
    <h1>Editar Detalle de Venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalle_ventas.update', $detalle->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="producto_id">Producto</label>
                    <select name="producto_id" id="producto_id" class="form-control">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" {{ $detalle->producto_id == $producto->id ? 'selected' : '' }}>
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $detalle->cantidad }}" required>
                </div>
                <div class="form-group">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input type="number" name="precio_unitario" id="precio_unitario" class="form-control" value="{{ $detalle->precio_unitario }}" required>
                </div>
                <div class="form-group">
                    <label for="descuento_item">Descuento</label>
                    <input type="number" name="descuento_item" id="descuento_item" class="form-control" value="{{ $detalle->descuento_item }}">
                </div>
                <div class="form-group">
                    <label for="tipo_presentacion">Tipo de Presentación</label>
                    <input type="text" name="tipo_presentacion" id="tipo_presentacion" class="form-control" value="{{ $detalle->tipo_presentacion }}">
                </div>
                <div class="form-group">
                    <label for="codigo_item">Código Item</label>
                    <input type="text" name="codigo_item" id="codigo_item" class="form-control" value="{{ $detalle->codigo_item }}">
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control">{{ $detalle->observaciones }}</textarea>
                </div>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </form>
        </div>
    </div>
@stop
