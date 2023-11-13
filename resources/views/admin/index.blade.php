@extends('adminlte::page')

@section('content_header')
    <h1>Sistema de punto de ventas <i class="fas fa-sitemap"></i></h1>
@stop

@section('content')
    <div class="row">
        @can('Usuarios')
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Usuarios</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('Proveedores')
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
        @endcan
        @can('Medidas')
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
        @endcan
        @can('Bodegas')
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
        @endcan
        @can('Estanterías')
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
        @endcan
        @can('Productos')
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
        @endcan
        @can('Compras')
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
        @endcan
        @can('Mis ventas')
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>Mis ventas</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="{{ route('admin.shop.sales.index') }}" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('Clientes')
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>Clientes</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-child"></i>
                    </div>
                    <a href="{{ route('admin.shop.customers.index') }}" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('Tienda')
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>Tienda</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <a href="{{ route('admin.shop.sales.products') }}" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('Ventas generales')
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>Reporte</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{ route('admin.shop.sales.list') }}" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
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
