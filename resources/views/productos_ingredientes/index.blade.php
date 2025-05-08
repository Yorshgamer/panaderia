@extends('adminlte::page')

@section('title', 'Productos e Ingredientes')

@section('content_header')
    <h1>Productos e Ingredientes</h1>
@stop

@section('content')
    <a href="{{ route('productos-ingredientes.create') }}" class="btn btn-success mb-3">+ Nuevo Producto-Ingrediente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Tipo de Uso</th>
                <th>Es Opcional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productosIngredientes as $productoIngrediente)
                <tr>
                    <td>{{ $productoIngrediente->id }}</td>
                    <td>{{ $productoIngrediente->producto->nombre }}</td>
                    <td>{{ $productoIngrediente->ingrediente->nombre }}</td>
                    <td>{{ $productoIngrediente->cantidad }}</td>
                    <td>{{ $productoIngrediente->unidad }}</td>
                    <td>{{ ucfirst($productoIngrediente->tipo_uso ?? 'N/A') }}</td>
                    <td>{{ $productoIngrediente->es_opcional ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('productos-ingredientes.show', $productoIngrediente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('productos-ingredientes.edit', $productoIngrediente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('productos-ingredientes.destroy', $productoIngrediente) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
