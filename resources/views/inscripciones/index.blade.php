@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px;">
        <div class="col-md-12">
            <div class="card m-7">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                            <h3 class="card-title">Lista de solicitudes de agremiados para inscripción al colegio</h3>
                        </div>

                        <hr style="border: 1px solid #ddd;"> <!-- Línea horizontal -->

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
                                <table class="table table-bordered table-striped mt-2">
                                    <thead style="background-color: #3288af;">
                                        <tr>
                                            <th class="text-center" style="color: white;">ID</th>
                                            <th class="text-center" style="color: white;">Nombre del solicitante</th>
                                            <th class="text-center" style="color: white;">DNI</th>
                                            <th class="text-center" style="color: white;">Correo electrónico</th>
                                            <th class="text-center" style="color: white;">Nº Celular</th>
                                            <th class="text-center" style="color: white;">Estado</th>
                                            <th class="text-center" style="color: white;">Descripción Estado Solicitud</th>
                                            <th class="text-center" style="color: white;">Ver inscripción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($inscripciones as $inscripcion)
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->id }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $inscripcion->name }} 
                                                    @if($inscripcion->name2) {{ $inscripcion->name2 }} @endif
                                                    {{ $inscripcion->apellido }} 
                                                    @if($inscripcion->apellido2) {{ $inscripcion->apellido2 }} @endif
                                                </td>
                                                <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->numero_identidad }}</td>
                                                <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->email }}</td>
                                                <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->telefono_celular }}</td>
                                                <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->estado }}</td>
                                                <td class="text-center" >{{ $inscripcion->descripcion_estado_solicitud }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
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
