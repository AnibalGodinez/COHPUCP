@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-7">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Roles</h3>
                    <a href="{{ url('roles/create') }}" class="btn btn-info btn-sm">Agregar nuevo Rol</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre del rol</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                            <tr>
                                <td class="text-center">{{ $role->id }}</td>
                                <td class="text-center">{{ $role->name }}</td>
                                <td class="text-center">
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                        <i class="tim-icons icon-settings"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('roles/'.$role->id.'/delete') }}')">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </a>

                                    <a href="{{url('roles/' .$role->id.'/agregar-permisos')}}" class="btn btn-info btn-sm">
                                        Agregar permisos
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($roles->hasPages())
                        <nav>
                            <ul class="pagination justify-content-start">
                                {{-- Enlace a la página anterior --}}
                                @if ($roles->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            <i class="fas fa-angle-double-left fa-lg"></i>
                                            Anterior
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $roles->previousPageUrl() }}" rel="prev">
                                            <i class="fas fa-angle-double-left fa-lg"></i>
                                            Anterior
                                        </a>
                                    </li>
                                @endif

                                {{-- Enlace a la página siguiente --}}
                                @if ($roles->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $roles->nextPageUrl() }}" rel="next">
                                            Siguiente
                                            <i class="fas fa-angle-double-right fa-lg"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            Siguiente
                                            <i class="fas fa-angle-double-right fa-lg"></i>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
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
