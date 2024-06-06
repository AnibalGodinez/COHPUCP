@extends('layouts.app', ['page' => __('Permisos'), 'pageSlug' => 'permisosUsuario'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-7">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Permisos</h3>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ url('permission/create') }}" class="btn btn-info btn-sm float-end">Agregar permisos</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($permissions as $permission)
                            <tr>
                                <td class="text-center">{{ $permission->id }}</td>
                                <td class="text-center">{{ $permission->name }}</td>
                                <td class="text-center">
                                    <a href="{{ url('permission/'.$permission->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                        <i class="tim-icons icon-settings"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('permission/'.$permission->id.'/delete') }}')">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmarEliminacion(url) {
        if (confirm('¿Estás seguro que quieres eliminar el permiso?')) {
            window.location.href = url;
        }
    }
</script>

@endsection
