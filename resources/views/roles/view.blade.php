@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'rolesMantenimiento'])

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Lista de Roles</h3>

                    {{-- Formulario de búsqueda --}}
                    <form method="GET" action="{{ route('roles.ver') }}" class="form-inline mt-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar roles" value="{{ request()->query('search') }}">
                        <button class="btn btn-info btn-round btn-simple">
                            <i class="tim-icons icon-zoom-split"></i> Buscar
                        </button>
                    </form>
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
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center">Fecha de Registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>{{ $role->created_at->format('d/m/Y H:i:s') }}</td>
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
@endsection
