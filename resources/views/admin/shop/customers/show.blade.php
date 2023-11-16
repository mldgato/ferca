@extends('adminlte::page')

@section('content_header')
    <h1>Información del cliente <i class="fas fa-child"></i></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="text-primary">Información del cliente <i class="fas fa-info"></i></span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="taxnumber">NIT:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <div class="form-control">{{ $customer->nit }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">Cliente:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control">{{ $customer->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control">{{ $customer->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <div class="form-control">{{ $customer->address }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control">{{ $customer->phone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <span class="text-primary">Compras del cliente <i class="fas fa-shopping-cart"></i></span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Venta</th>
                            <th>NIT</th>
                            <th>Vendedor</th>
                            <th>Total</th>
                            <th>
                                Fecha
                            </th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td class="align-middle">{{ $sale->id }}</td>
                                <td class="align-middle">{{ $sale->nit }}</td>
                                <td class="align-middle">{{ $sale->name }}</td>
                                <td class="align-middle">Q. {{ number_format($sale->total, 2, '.', ',') }}</td>
                                <td class="align-middle">{{ $sale->date }}</td>

                                <td class="align-middle text-right">
                                    <a href="{{ route('admin.shop.sales.show', $sale->id) }}"
                                        class="btn btn-primary btn-sm mr-2" title="Agregar a la compra"><i
                                            class="fas fa-file-invoice-dollar"></i></a>
                                    <a href="#{{-- {{ route('admin.stocktaking.buys.pdf', $sale->id) }} --}}" class="btn btn-danger btn-sm mr-2" title="PDF"
                                        target="_blank"><i class="fas fa-file-pdf"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Venta</th>
                            <th>NIT</th>
                            <th>Vendedor</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>&nbsp;</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
