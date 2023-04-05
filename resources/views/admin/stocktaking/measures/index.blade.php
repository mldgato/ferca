@extends('adminlte::page')

@section('content_header')
    <h1>Medidas <i class="fas fa-ruler-horizontal"></i></h1>
@stop

@section('content')
    @livewire('admin.stocktaking.measures.show-measures')
@stop

@section('footer')
    <div class="d-flex justify-content-end">
        <b>Version</b> 1.3
    </div>
    <strong>Sistema de Puntos de Venta. Todos los derechos reservados © 2022 - {{ date('Y') }}. </strong>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop