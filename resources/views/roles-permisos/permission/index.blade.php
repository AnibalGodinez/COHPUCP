@extends('layouts.app', ['page' => __('Permisos'), 'pageSlug' => 'permisos'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-7">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Permisos</h3>
                    <a href="{{ url('permission/create') }}" class="btn btn-info btn-sm">Agregar nuevo permiso</a>
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

                    {{ $permissions->links('vendor.pagination.simple-bootstrap-4') }}

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
