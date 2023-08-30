@extends('adminlte::page')

@section('content_header')
    <h1>Sistema de punto de ventas <i class="fas fa-sitemap"></i></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Proveedores</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas fa-people-carry"></i>
                </div>
                <a href="{{ route('admin.stocktaking.suppliers.index') }}" class="small-box-footer">Acceder <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>Medidas</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ruler-horizontal"></i>
                </div>
                <a href="{{ route('admin.stocktaking.measures.index') }}" class="small-box-footer">Acceder <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Bodegas</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <a href="{{ route('admin.stocktaking.warehouses.index') }}" class="small-box-footer">Acceder <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Estaterías</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <a href="{{ route('admin.stocktaking.racks.index') }}" class="small-box-footer">Acceder <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Productos</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas fa-toolbox"></i>
                </div>
                <a href="{{ route('admin.stocktaking.products.index') }}" class="small-box-footer">Acceder <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="small-box">
                <div class="inner">
                    <h3>Compras</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-basket"></i>
                </div>
                <a href="{{ route('admin.stocktaking.buys.index') }}" class="small-box-footer text-secondary">Acceder <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
