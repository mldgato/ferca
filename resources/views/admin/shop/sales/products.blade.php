@extends('adminlte::page')

@section('content_header')
    <h1>Ventas <i class="fas fa-fw fa-store "></i></h1>
@stop

@section('content')
    @if (session('message'))
        <div class="row">
            <div class="col">
                <div id="AlertaExito" class="alert {{ session('class') }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('title') }}</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    @livewire('admin.shop.sales.show-products')
@stop

@section('css')

@stop

@section('js')

@stop
