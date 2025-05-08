<!-- resources/views/detalle_venta/create.blade.php -->

@extends('adminlte::page')

@section('title', 'Agregar Detalle de Venta')

@section('content_header')
    <h1>Agregar Detalle de Venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalle_venta.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="producto_id">Producto</label>
                    <select name="producto_id" id="producto_id" class="form-control">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input type="number" name="precio_unitario" id="precio_unitario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descuento_item">Descuento</label>
                    <input type="number" name="descuento_item" id="descuento_item" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tipo_presentacion">Tipo de Presentación</label>
                    <input type="text" name="tipo_presentacion" id="tipo_presentacion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="codigo_item">Código Item</label>
                    <input type="text" name="codigo_item" id="codigo_item" class="form-control">
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
@stop
