@extends('adminlte::page')

@section('content_header')
    <h1>Nueva venta <i class="fas fa-cash-register"></i></h1>
@stop

@section('content')
    <form action="{{ route('admin.stocktaking.buys.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <span class="text-primary"><i class="fas fa-info"></i> Información</span>
            </div>
            <div class="card-body">

            </div>
        </div>
        @if (session('success'))
            <div class="row">
                <div class="col">
                    <div id="AlertaExito" class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>¡Proceso registrado!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.shop.sales.index') }}"
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
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th style="width: 15%">Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart_sale'))
                                @foreach (session('cart_sale') as $id => $details)
                                    @php $total += floatval($details['price']) * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="align-middle" style="width: 100px; height=100px">
                                            <input type="hidden" name="product_id[]" value="{{ $id }}">
                                            <img class="img-fluid"
                                                src="@if ($details['image'] != 'No_image') {{ Storage::url($details['image']) }} @else https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg @endif"
                                                alt="">
                                        </td>
                                        <td>{{ $details['cod'] }}</td>
                                        <td>{{ $details['name'] }}</td>
                                        <td>
                                            {{ number_format($details['price'], 2, '.', ',') }}
                                            <input type="hidden" value="{{ $details['price'] }}" name="price[]">
                                        </td>
                                        <td><input type="number" value="{{ $details['quantity'] }}"
                                                class="form-control quantity update-quantity" min="1"
                                                name="quantity[]" id="quantity_{{ $id }}" required />
                                        </td>
                                        <td>Q.
                                            {{ number_format(floatval($details['price']) * $details['quantity'], 2, '.', ',') }}
                                        </td>
                                        <td class="actions" class="align-middle text-center">
                                            <button type="button" class="btn btn-danger btn-sm remove-from-cart"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-right">
                                    <h3><strong>Total Q. {{ number_format($total, 2, '.', ',') }}</strong></h3>
                                    <input type="hidden" name="total" id="total" value="{{ $total }}">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button type="submit" id="btnsubmit" class="btn btn-success btn-lg">Guardar <i
                            class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')

@stop

@section('js')

@stop
