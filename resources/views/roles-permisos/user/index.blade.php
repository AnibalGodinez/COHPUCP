@extends('layouts.app', ['page' => __('Usuarios'), 'pageSlug' => 'usuarios'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-7">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Usuarios</h3>
                    <a href="{{ url('usuarios/create') }}" class="btn btn-info btn-sm">Agregar usuario</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre del usuario</th>
                                <th class="text-center">Correo electrónico</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>

                                <td class="text-center">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                        <label class="badge bg-info mx-1 text-white">{{ $rolename }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                
                                <td class="text-center">
                                    <a href="{{ url('usuarios/'.$user->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                        <i class="tim-icons icon-settings"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('usuarios/'.$user->id.'/delete') }}')">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($users->hasPages())
                        <nav>
                            <ul class="pagination justify-content-start">
                                {{-- Enlace a la página anterior --}}
                                @if ($users->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            <i class="fas fa-angle-double-left fa-lg"></i>
                                            Anterior
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">
                                            <i class="fas fa-angle-double-left fa-lg"></i>
                                            Anterior
                                        </a>
                                    </li>
                                @endif

                                {{-- Enlace a la página siguiente --}}
                                @if ($users->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">
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
    if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
        window.location.href = url;
    }
}
</script>

@endsection
