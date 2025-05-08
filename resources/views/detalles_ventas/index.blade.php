@extends('adminlte::page')

@section('title', 'Detalles de Venta')

@section('content_header')
    <h1>Detalles de Venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('detalle_venta.create') }}" class="btn btn-primary">Agregar Detalle de Venta</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->id }}</td>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ number_format($detalle->precio_unitario, 2) }}</td>
                            <td>{{ number_format($detalle->subtotal, 2) }}</td>
                            <td>
                                <a href="{{ route('detalle_venta.edit', $detalle->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('detalle_venta.destroy', $detalle->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop