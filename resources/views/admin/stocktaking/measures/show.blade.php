@extends('adminlte::page')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1><i class="fas fa-ruler-horizontal"></i> Unidad de medida: <span
                    class="text-danger">{{ $measure->unit }}</span></h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.stocktaking.measures.index') }}" class="btn btn-outline-warning btn-lg"
                    title="Regresar"><i class="fas fa-backward"></i></a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Cod.</th>
                            <th>Producto</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="{{ $product->claseFila }}">
                                <td>{{ $product->cod }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cod.</th>
                            <th>Producto</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div class="d-flex justify-content-end">
        <b>Version</b> 1.3
    </div>
    <strong>Sistema de Puntos de Venta. Todos los derechos reservados © 2022 - {{ date('Y') }}. </strong>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
