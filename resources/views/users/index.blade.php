@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <h3 class="card-title"><strong>Lista de usuarios</strong></h3>
                        </div>

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

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-4">
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
                                            <td class="text-center" style="white-space: nowrap;">{{ $user->id }}</td>
                                            <td style="white-space: nowrap;">{{ $user->name }} {{ $user->name2 }} {{ $user->apellido }} {{ $user->apellido2 }}</td>
                                            <td style="white-space: nowrap;">{{ $user->numero_identidad }}</td>
                                            <td style="white-space: nowrap;">{{ $user->numero_colegiacion }}</td>
                                            <td style="white-space: nowrap;">{{ $user->rtn }}</td>
                                            <td style="white-space: nowrap;">{{ $user->sexo ? $user->sexo->nombre : '' }}</td>
                                            <td style="white-space: nowrap;">{{ $user->fecha_nacimiento }}</td>
                                            <td style="white-space: nowrap;">
                                                @if (!empty($user->fecha_nacimiento))
                                                    {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->age }} años
                                                @endif
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $user->pais ? $user->pais->nombre : '' }}</td>
                                            <td style="white-space: nowrap;">
                                                @if ($user->telefono)
                                                    @if ($user->pais)
                                                        {{ $user->pais->codigo }} {{ $user->telefono }}
                                                    @else
                                                        {{ $user->telefono }}
                                                    @endif
                                                @endif
                                            </td>
                                            <td style="white-space: nowrap;">
                                                @if ($user->telefono_celular)
                                                    @if ($user->pais)
                                                        {{ $user->pais->codigo }} {{ $user->telefono_celular }}
                                                    @else
                                                        {{ $user->telefono_celular }}
                                                    @endif
                                                @endif
                                            </td>
                                            <td style="white-space: nowrap;">{{ $user->email }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $user->estado }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $roleName)
                                                        <label class="badge bg-info mx-1 text-white">{{ $roleName }}</label>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td class="text-center" style="white-space: nowrap;">
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
                        </div>

                        {{ $users->links('paginacion.simple-bootstrap-4') }}
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
