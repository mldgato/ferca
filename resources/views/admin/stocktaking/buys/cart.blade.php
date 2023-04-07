@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Compra <i class="fas fa-shopping-cart"></i></h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
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
