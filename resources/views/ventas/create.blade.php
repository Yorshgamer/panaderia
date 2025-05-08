@extends('adminlte::page')

@section('title', 'Crear Venta')

@section('content_header')
    <h1>Crear Venta</h1>
@stop

@section('content')
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Seleccione un Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tipo_pago">Tipo de Pago</label>
            <select name="tipo_pago" id="tipo_pago" class="form-control" required>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="yape">Yape</option>
                <option value="plin">Plin</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="numero_comprobante">Número de Comprobante</label>
            <input type="text" name="numero_comprobante" id="numero_comprobante" class="form-control">
        </div>

        <div class="form-group">
            <label for="igv">IGV</label>
            <input type="number" step="0.01" name="igv" id="igv" class="form-control">
        </div>

        <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="number" step="0.01" name="descuento" id="descuento" class="form-control">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="completado">Completado</option>
                <option value="pendiente">Pendiente</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="forma_entrega">Forma de Entrega</label>
            <select name="forma_entrega" id="forma_entrega" class="form-control">
                <option value="recojo">Recojo</option>
                <option value="delivery">Delivery</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Venta</button>
    </form>
@stop
