@extends('layouts.app', ['page' => __('Permisos'), 'pageSlug' => 'permisosMantenimiento'])

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                <div class="alert alert-success text-center">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">Lista de Permisos</h3>

                        {{-- Formulario de búsqueda --}}
                        <form method="GET" action="{{ route('seguridad.permisos') }}" class="form-inline mt-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar permisos" value="{{ request()->query('search') }}">
                            <button class="btn btn-info btn-round btn-simple">
                                <i class="tim-icons icon-zoom-split"></i> Buscar
                            </button>
                        </form>
                    </div>

                    <div class="card-body">
                        @if( $permissions ->isEmpty())
                            <div class="alert alert-default text-center" permission="alert">
                                No hay ningún resultado de su búsqueda.
                            </div>
                        @else
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="text-center">Fecha de Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions  as $permission)
                                            <tr>
                                                <td class="text-center">{{ $permission->id }}</td>
                                                <td class="text-center">{{ $permission->name }}</td>
                                                <td class="text-center">{{ $permission->description }}</td>
                                                <td class="text-center">{{ $permission->created_at->format('d/m/Y H:i:s') }}</td>
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
@endsection
