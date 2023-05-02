@extends('adminlte::page')

@section('content_header')
    <h1>Compras <i class="fas fa-file-invoice"></i></h1>
@stop

@section('content')
    @livewire('admin.stocktaking.buys.show-buys')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
