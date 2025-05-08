@extends('adminlte::page')

@section('title', 'Detalles de Venta')

@section('content_header')
    <h1>Detalles de Venta</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $venta->id }}</td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{ $venta->cliente->name }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ $venta->fecha }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{ number_format($venta->total, 2) }}</td>
        </tr>
        <tr>
            <th>Tipo de Pago</th>
            <td>{{ ucfirst($venta->tipo_pago) }}</td>
        </tr>
        <tr>
            <th>Número de Comprobante</th>
            <td>{{ $venta->numero_comprobante }}</td>
        </tr>
        <tr>
            <th>IGV</th>
            <td>{{ number_format($venta->igv, 2) }}</td>
        </tr>
        <tr>
            <th>Descuento</th>
            <td>{{ number_format($venta->descuento, 2) }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ ucfirst($venta->estado) }}</td>
        </tr>
        <tr>
            <th>Observaciones</th>
            <td>{{ $venta->observaciones }}</td>
        </tr>
        <tr>
            <th>Forma de Entrega</th>
            <td>{{ ucfirst($venta->forma_entrega) }}</td>
        </tr>
    </table>

    <h4>Productos Vendidos:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Descuento</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                    <td>{{ number_format($producto->pivot->subtotal, 2) }}</td>
                    <td>{{ number_format($producto->pivot->descuento_item, 2) }}</td>
                    <td>{{ number_format($producto->pivot->subtotal - $producto->pivot->descuento_item, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Regresar</a>
@stop
