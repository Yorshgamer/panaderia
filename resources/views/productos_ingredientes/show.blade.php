@extends('adminlte::page')

@section('title', 'Ver Producto-Ingrediente')

@section('content_header')
    <h1>Detalles Producto-Ingrediente</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $productoIngrediente->id }}</td>
        </tr>
        <tr>
            <th>Producto</th>
            <td>{{ $productoIngrediente->producto->nombre }}</td>
        </tr>
        <tr>
            <th>Ingrediente</th>
            <td>{{ $productoIngrediente->ingrediente->nombre }}</td>
        </tr>
        <tr>
            <th>Cantidad</th>
            <td>{{ $productoIngrediente->cantidad }}</td>
        </tr>
        <tr>
            <th>Unidad</th>
            <td>{{ $productoIngrediente->unidad }}</td>
        </tr>
        <tr>
            <th>Tipo de Uso</th>
            <td>{{ ucfirst($productoIngrediente->tipo_uso ?? 'N/A') }}</td>
        </tr>
        <tr>
            <th>Es Opcional</th>
            <td>{{ $productoIngrediente->es_opcional ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Observaciones</th>
            <td>{{ $productoIngrediente->observaciones }}</td>
        </tr>
        <tr>
            <th>Creado por</th>
            <td>{{ $productoIngrediente->creado_por }}</td>
        </tr>
        <tr>
            <th>Fecha Registro</th>
            <td>{{ $productoIngrediente->fecha_registro }}</td>
        </tr>
    </table>

    <a href="{{ route('productos-ingredientes.index') }}" class="btn btn-secondary">Regresar</a>
@stop
