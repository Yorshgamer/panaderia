@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel Principal</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 mb-4">
            <a href="{{ route('categorias.index') }}" class="btn btn-primary btn-block py-4 shadow-sm">
                <i class="fas fa-tags fa-2x mb-2 d-block"></i>
                <span class="h4">Categorías</span>
            </a>
        </div>
        <div class="col-lg-5 col-md-6 mb-4">
            <a href="{{ route('productos.index') }}" class="btn btn-success btn-block py-4 shadow-sm">
                <i class="fas fa-boxes fa-2x mb-2 d-block"></i>
                <span class="h4">Productos</span>
            </a>
        </div>
        <div class="col-lg-5 col-md-6 mb-4">
            <a href="{{ route('ventas.index') }}" class="btn btn-danger btn-block py-4 shadow-sm">
                <i class="fas fa-shopping-cart fa-2x mb-2 d-block"></i>
                <span class="h4">Ventas</span>
            </a>
        </div>
        <div class="col-lg-5 col-md-6 mb-4">
            <a href="{{ route('detalle_ventas.index') }}" class="btn btn-secondary btn-block py-4 shadow-sm">
                <i class="fas fa-file-invoice fa-2x mb-2 d-block"></i>
                <span class="h4">Detalle Ventas</span>
            </a>
        </div>
    </div>
</div>
@stop