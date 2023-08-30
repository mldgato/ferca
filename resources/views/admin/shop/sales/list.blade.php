@extends('adminlte::page')

@section('content_header')
    <h1>Lista de ventas <i class="far fa-list-alt"></i></h1>
@stop

@section('content')
    @livewire('admin.shop.sales.sales-list')
@stop