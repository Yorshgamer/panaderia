@extends('adminlte::page')

@section('title', 'Ingredientes')

@section('content_header')
    <h1>Lista de Ingredientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('ingredientes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Ingrediente
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Unidad</th>
                        <th>Stock Actual</th>
                        <th>Stock Mínimo</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingredientes as $ingrediente)
                        <tr>
                            <td>{{ $ingrediente->nombre }}</td>
                            <td>{{ $ingrediente->unidad }}</td>
                            <td>{{ $ingrediente->stock_actual }}</td>
                            <td>{{ $ingrediente->stock_minimo }}</td>
                            <td>{{ $ingrediente->proveedor }}</td>
                            <td>{{ ucfirst($ingrediente->estado) }}</td>
                            <td>
                                <a href="{{ route('ingredientes.show', $ingrediente->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('ingredientes.edit', $ingrediente->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('ingredientes.destroy', $ingrediente->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este ingrediente?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
