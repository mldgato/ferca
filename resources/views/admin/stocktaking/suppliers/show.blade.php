@extends('adminlte::page')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1><i class="fas fa-building"></i> Proveedor: <span class="text-danger">{{ $supplier->company }}</span></h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.stocktaking.suppliers.index') }}" class="btn btn-outline-warning btn-lg"
                    title="Regresar"><i class="fas fa-backward"></i></a>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <span class="text-primary"><i class="fas fa-info"></i> Información</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="taxnumber">NIT:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <div class="form-control">{{ $supplier->taxnumber }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <div class="form-control">{{ $supplier->address }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <div class="form-control">{{ $supplier->phone }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="form-group">
                        <label for="seller">Vendedor:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control">{{ $supplier->seller }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="row">
            <div class="col">
                <div id="AlertaExito" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>¡Producto agregado!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    @livewire('admin.stocktaking.suppliers.show-producs', ['supplier' => $supplier])
@stop

@section('footer')
    <div class="d-flex justify-content-end">
        <b>Version</b> 1.3
    </div>
    <strong>Sistema de Puntos de Venta. Todos los derechos reservados © 2022 - {{ date('Y') }}. </strong>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var myAlert = document.querySelector('#AlertaExito');
            setTimeout(function() {
                myAlert.classList.remove('show');
            }, 3000);
        });
    </script>
@stop
