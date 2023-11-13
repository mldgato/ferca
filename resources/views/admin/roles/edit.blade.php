@extends('adminlte::page')

@section('content_header')
    <h1>Crear un nuevo rol <i class="fas fa-id-card-alt"></i></h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <span class="text-primary">Editar rol <i class="fas fa-users-cog"></i></span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Rol:</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Ingrese el nombre del rol" value="{{ $role->name }}">
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
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-1"
                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
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
    @if (session('RolCreado'))
        <script>
            Swal.fire('Información', 'Rol creado exitósamente', 'info');
        </script>
    @endif
    @if (session('RolActualizado'))
        <script>
            Swal.fire('Información', 'Rol actualizado exitósamente', 'info');
        </script>
    @endif
@stop
