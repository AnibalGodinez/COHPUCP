@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 600px;">LISTA DE SOLICITUDES DE INSCRIPCIÓN AL COHPUCP</h3>
                        </div>

                        {{-- Mensajes de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Formulario de búsqueda --}}
                        <form action="{{ url('inscripciones') }}" method="GET" class="form-inline mt-3">
                            <input type="text" name="search" class="form-control mr-2 col-2" placeholder="Buscar inscripciones" value="{{ request()->query('search') }}">
                            <button class="btn btn-info btn-round btn-simple" type="submit">
                                <i class="tim-icons icon-zoom-split"></i> Buscar
                            </button>
                        </form>

                        @if($inscripciones->isEmpty())
                            <div class="alert alert-default text-center" role="alert">
                                No hay solicitudes
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre del solicitante</th>
                                            <th class="text-center">DNI</th>
                                            <th class="text-center">Correo electrónico</th>
                                            <th class="text-center">Nº Celular</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Descripción del estado de la solicitud</th>
                                            <th class="text-center">Ver inscripción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($inscripciones as $inscripcion)
                                            <tr>
                                                <td class="text-center">{{ $inscripcion->id }}</td>
                                                <td class="text-center">
                                                    {{ $inscripcion->name }} 
                                                    @if($inscripcion->name2) {{ $inscripcion->name2 }} @endif
                                                    {{ $inscripcion->apellido }} 
                                                    @if($inscripcion->apellido2) {{ $inscripcion->apellido2 }} @endif
                                                </td>
                                                <td class="text-center">{{ $inscripcion->numero_identidad }}</td>
                                                <td class="text-center">{{ $inscripcion->email }}</td>
                                                <td class="text-center">{{ $inscripcion->telefono_celular }}</td>
                                                <td class="text-center">{{ $inscripcion->estado }}</td>
                                                <td class="text-center">{{ $inscripcion->descripcion_estado_solicitud }}</td>
                                                <td class="text-center">
                                                    <!-- Botón para ver los detalles de la inscripción -->
                                                    <a href="{{ route('inscripciones.show', $inscripcion->id) }}" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
