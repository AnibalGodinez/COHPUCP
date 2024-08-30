@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">
                <div class="card-body">
                    <h3 class="text-center">LISTA DE USUARIOS</h3>

                    <!-- Mensaje de éxito -->
                    @if(session('status'))
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                            {{ session('status') }}
                            <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead style="background-color: #3288af;">
                            <tr>
                                <th class="text-center" style="color: white;">ID</th>
                                <th class="text-center" style="color: white;">Nombre completo</th>
                                <th class="text-center" style="color: white;">DNI</th>
                                <th class="text-center" style="color: white;">Nº colegiación</th>
                                <th class="text-center" style="color: white;">RTN</th>
                                <th class="text-center" style="color: white;">Sexo</th>
                                <th class="text-center" style="color: white;">Fecha de nacimiento</th>
                                <th class="text-center" style="color: white;">Edad</th>
                                <th class="text-center" style="color: white;">País</th>
                                <th class="text-center" style="color: white;">Teléfono</th>
                                <th class="text-center" style="color: white;">Teléfono celular</th>
                                <th class="text-center" style="color: white;">Correo electrónico</th>
                                <th class="text-center" style="color: white;">Estado</th>
                                <th class="text-center" style="color: white;">Rol asignado</th>
                                <th class="text-center" style="color: white;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }} {{ $user->name2 }} {{ $user->apellido }} {{ $user->apellido2 }}</td>
                                <td>{{ $user->numero_identidad }}</td>
                                <td>{{ $user->numero_colegiacion }}</td>
                                <td>{{ $user->rtn }}</td>
                                <td>{{ $user->sexo ? $user->sexo->nombre : '' }}</td>
                                <td>{{ $user->fecha_nacimiento }}</td>
                                <td>
                                    @if (!empty($user->fecha_nacimiento))
                                        {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->age }} años
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $user->pais ? $user->pais->nombre : '' }}
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
                                    <a href="{{ url('usuarios/'.$user->id) }}" class="btn btn-default btn-sm btn-icon">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td> 

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('paginacion.simple-bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
