@extends('adminlte::page')

@section('content_header')
    <h1>Listado de clientes <i class="fas fa-fw fa-user-tag "></i></h1>
@stop

@section('content')
    @livewire('admin.shop.customers.show-customers')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop