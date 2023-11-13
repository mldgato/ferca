@extends('adminlte::page')

@section('content_header')
    <h1>Lista de usuarios <i class="fas fa-users"></i></h1>
@stop

@section('content')
    @livewire('admin.users.show-users')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
