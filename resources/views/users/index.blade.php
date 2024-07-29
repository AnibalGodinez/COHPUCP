@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-7">
                <div class="card-body">
                    <h3 class="text-center">GESTIONAR USUARIOS</h3>

                    @if (session('status'))
                        <div class="alert alert-success text-center">{{ session('status') }}</div>
                    @endif

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
                                    <th class="text-center">Nombre completo</th>
                                    <th class="text-center">DNI</th>
                                    <th class="text-center">Nº colegiación</th>
                                    <th class="text-center">RTN</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Fecha de nacimiento</th>
                                    <th class="text-center">Edad</th>
                                    <th class="text-center">País</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Teléfono celular</th>
                                    <th class="text-center">Correo electrónico</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Rol</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }} {{ $user->name2 }} {{ $user->apellido }} {{ $user->apellido2 }}</td>
                                    <td>{{ $user->numero_identidad }}</td>
                                    <td>{{ $user->numero_colegiacion }}</td>
                                    <td>{{ $user->rtn }}</td>
                                    <td>{{ $user->sexo }}</td>
                                    <td>{{ $user->fecha_nacimiento }}</td>
                                    <td>
                                        @if (!empty($user->fecha_nacimiento))
                                            {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->age }} años
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $user->pais ? $user->pais->nombre : 'No asignado' }}
                                    </td>
                                    <td>
                                        @if ($user->telefono)
                                            @if ($user->pais)
                                                {{ $user->pais->codigo }} {{ $user->telefono }}
                                            @else
                                                {{ $user->telefono }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->telefono_celular)
                                            @if ($user->pais)
                                                {{ $user->pais->codigo }} {{ $user->telefono_celular }}
                                            @else
                                                {{ $user->telefono_celular }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->estado }}</td>
                                    <td class="text-center">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $roleName)
                                                <label class="badge bg-info mx-1 text-white">{{ $roleName }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                        {{-- BOTONES PARA LAS ACCIONES --}}
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
                        {{ $users->links('paginacion.simple-bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmarEliminacion(url) {
        if (confirm('¿Estás seguro que quieres eliminar el usuario?')) {
            window.location.href = url;
        }
    }
</script>
@endsection
