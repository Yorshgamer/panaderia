@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel Principal</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ route('categorias.index') }}" class="btn btn-primary btn-block">
            <i class="fas fa-tags"></i> Categorías
        </a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ route('productos.index') }}" class="btn btn-success btn-block">
            <i class="fas fa-boxes"></i> Productos
        </a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ route('ventas.index') }}" class="btn btn-danger btn-block">
            <i class="fas fa-shopping-cart"></i> Ventas
        </a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ route('detalle.ventas.index') }}" class="btn btn-secondary btn-block">
            <i class="fas fa-file-invoice"></i> Detalle Ventas
        </a>
    </div>
</div>
@stop
