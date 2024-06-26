@extends('layouts.app', ['page' => __('Usuarios'), 'pageSlug' => 'usuarios'])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            <div class="card mt-7">

                <div class="card-body">
                    {{-- Formulario de búsqueda --}}
                    <form action="{{ url('usuarios') }}" method="GET" class="form-inline mt-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar usuarios" value="{{ request()->query('search') }}">
                        <button class="btn btn-info btn-round btn-simple">
                            <i class="tim-icons icon-zoom-split"></i> Buscar
                        </button>
                    </form><br>

                    @if($users->isEmpty())
                        <div class="alert alert-default text-center" role="alert">
                            No hay ningún resultado de su búsqueda.
                        </div>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Primer nombre</th>
                                    <th class="text-center">Segundo nombre</th>
                                    <th class="text-center">Primer apellido</th>
                                    <th class="text-center">Segundo apellido</th>
                                    <th class="text-center">Número de identidad </th>
                                    <th class="text-center">Número de colegiación</th>
                                    <th class="text-center">RTN</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Fecha de nacimiento</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Teléfono celular</th>

                                    <th class="text-center">Correo electrónico</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Roles</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->name2 }}</td>
                                    <td>{{ $user->apellido }}</td>
                                    <td>{{ $user->apellido2 }}</td>
                                    <td>{{ $user->numero_identidad }}</td>
                                    <td>{{ $user->numero_colegiacion }}</td>
                                    <td>{{ $user->rtn }}</td>
                                    <td>{{ $user->sexo }}</td>
                                    <td>{{ $user->fecha_nacimiento }}</td>
                                    <td>{{ $user->telefono }}</td>
                                    <td>{{ $user->telefono_celular }}</td>

                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->estado }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $roleName)
                                                <label class="badge bg-info mx-1 text-white">{{ $roleName }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="{{ url('usuarios/'.$user->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </a>

                                        {{-- BOTÓN HABILITADO PARA ELIMINAR USUARIOS --}}
                                        {{-- <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('usuarios/'.$user->id.'/delete') }}')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </a> --}}

                                        {{-- BOTÓN INHABILITADO PARA ELIMINAR USUARIOS --}}
                                        <a href="#" class="btn btn-danger btn-sm btn-icon disabled" onclick="return false;" aria-disabled="true">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links('paginacion.simple-bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
