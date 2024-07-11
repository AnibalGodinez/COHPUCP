@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">GESTIÓN DE ROLES</h3>
                    
                    @if (session('status'))
                    <div class="alert alert-success text-center">{{ session('status') }}</div>
                    @endif

                    {{-- Formulario de búsqueda --}}
                    <form action="{{ url('roles') }}" method="GET" class="form-inline mt-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar roles" value="{{ request()->query('search') }}">
                        <button class="btn btn-info btn-round btn-simple">
                            <i class="tim-icons icon-zoom-split"></i> Buscar
                        </button>
                    </form><br>
                </div>

                <div class="card-body">
                    @if($roles->isEmpty())
                        <div class="alert alert-default text-center" role="alert">
                            No hay ningún resultado de su búsqueda.
                        </div>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre del rol</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('roles/'.$role->id.'/delete') }}')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </a>

                                        <a href="{{ url('roles/'.$role->id.'/agregar-permisos') }}" class="btn btn-info btn-sm">
                                            Asignar permisos
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links('paginacion.simple-bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function confirmarEliminacion(url) {
            if (confirm('¿Estás seguro que quieres eliminar el rol?')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
