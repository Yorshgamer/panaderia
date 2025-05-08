@extends('adminlte::page')

@section('title', 'Ingredientes')

@section('content_header')
    <h1>Ingredientes</h1>
@stop

@section('content')
    <a href="{{ route('ingredientes.create') }}" class="btn btn-success mb-3">+ Nuevo Ingrediente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Unidad</th>
                <th>Stock Actual</th>
                <th>Costo Unitario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredientes as $ingrediente)
                <tr>
                    <td>{{ $ingrediente->id }}</td>
                    <td>{{ $ingrediente->nombre }}</td>
                    <td>{{ $ingrediente->unidad }}</td>
                    <td>{{ $ingrediente->stock_actual }}</td>
                    <td>{{ $ingrediente->costo_unitario }}</td>
                    <td>{{ $ingrediente->estado }}</td>
                    <td>
                        <a href="{{ route('ingredientes.show', $ingrediente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('ingredientes.edit', $ingrediente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('ingredientes.destroy', $ingrediente) }}" method="POST" style="display:inline-block">
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
