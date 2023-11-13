@extends('adminlte::page')

@section('content_header')
    <h1>Roles y permisos <i class="fas fa-id-card-alt"></i></h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.roles.create') }}" type="button" class="btn btn-outline-primary btn-lg ml-2">
                    <i class="fas fa-plus-circle"></i> Nuevo Rol
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-success btn-sm mr-2"
                                        title="Editar"><i class="fas fa-edit fa-fw"></i></a>
                                </td>
                            </tr>
                        @endforeach
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

@stop
