@extends('adminlte::page')

@section('content_header')
    <h1>Crear un nuevo rol <i class="fas fa-id-card-alt"></i></h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <span class="text-primary">Nombre del nuevo rol <i class="fas fa-users-cog"></i></span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Rol:</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Ingrese el nombre del nuevo rol">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2 class="text-danger">Lista de permisos <i class="fas fa-user-shield"></i></h2>
                        @foreach ($permissions as $permission)
                            <div>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="mr-1">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" name="submitRole" class="btn btn-success">Guardar <i
                                class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
