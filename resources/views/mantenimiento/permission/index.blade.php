@extends('layouts.app', ['page' => __('Permisos'), 'pageSlug' => 'mantenimientoPermisos'])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            <div class="card mt-7">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Permisos</h3>
                    <a href="{{ url('permission/create') }}" class="btn btn-info btn-sm ">  <i class="fas fa-plus-circle"></i> Crear nuevo permiso</a>
                </div>
                
                <div class="card-body">

                    {{-- Formulario de búsqueda --}}
                    <form action="{{ url('permission') }}" method="GET" class="form-inline mt-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar permisos" value="{{ request()->query('search') }}">
                        <button class="btn btn-info btn-round btn-simple">
                            <i class="tim-icons icon-zoom-split"></i> Buscar
                        </button>
                    </form><br>

                    @if($permissions->isEmpty())
                        <div class="alert alert-default text-center" role="alert">
                            No hay ningún resultado de su búsqueda.
                        </div>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>
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

                        {{ $permissions->links('paginacion.simple-bootstrap-4') }}
                    @endif

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
