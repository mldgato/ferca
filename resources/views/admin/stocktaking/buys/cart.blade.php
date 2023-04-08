@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Compra <i class="fas fa-shopping-cart"></i></h1>
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
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.stocktaking.suppliers.show', $supplier->id) }}"
                            class="btn btn-outline-warning btn-lg ml-2">Seleccionar más productos <i
                                class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="cart" class="table table-sm table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Producto</th>
                            <th>Costo</th>
                            <th>Cantidad</th>
                            <th class="text-center">Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <tr data-id="{{ $id }}">
                                    <td class="align-middle" style="width: 100px; height=100px">
                                        <img class="img-fluid"
                                            src="@if ($details['image'] != 'No_image') {{ Storage::url($details['image']) }} @else https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg @endif"
                                            alt="">
                                    </td>
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ $details['cost'] }}</td>
                                    <td><input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" /></td>
                                    @php
                                        $subtotal = $details['cost'] * $details['quantity']
                                    @endphp
                                    <td>Q. {{number_format(1500, 2, '.', ',')}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
