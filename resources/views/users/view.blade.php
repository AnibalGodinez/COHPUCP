@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px;">
            <div class="col-md-12">
                <div class="card m-7">

                    <div class="card-header d-flex justify-content-between align-items-center py-3" style="background-color: #b1b3b6; border-bottom: 1px solid #7e7979;">
                        <h3 class="card-title"><strong>Lista de usuarios</strong></h3>
                        <a href="{{ route('usuarios.export.excel') }}" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Descargar Excel
                        </a>
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-4">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Ver</th>
                                        <th class="text-center" style="color: white;">Rol asignado</th>
                                        <th class="text-center" style="color: white;">Estado</th>
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
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap;">{{ $user->id }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <a href="{{ url('usuarios/'.$user->id) }}" class="btn btn-info btn-sm btn-icon">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $roleName)
                                                        <strong>{{ $roleName }}</strong>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;"><strong>{{ $user->estado }}</strong></td>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $users->links('paginacion.simple-bootstrap-4') }}           
                </div>
            </div>
        </div>
    </div>
@endsection
