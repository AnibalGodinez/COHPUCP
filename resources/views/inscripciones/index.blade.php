@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px;">
        <div class="col-md-12">
            <div class="card m-7">

                <div class="card-header d-flex justify-content-center align-items-center py-3" style="background-color: #b1b3b6; border-bottom: 1px solid #7e7979;">
                    <h3 class="card-title"><strong>Solicitudes de inscripción al colegio</strong></h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Ver</th>
                                        <th class="text-center" style="color: white;">Nombre del solicitante</th>
                                        <th class="text-center" style="color: white;">DNI</th>
                                        <th class="text-center" style="color: white;">Correo electrónico</th>
                                        <th class="text-center" style="color: white;">Nº Celular</th>
                                        <th class="text-center" style="color: white;">Estado</th>
                                        <th class="text-center" style="color: white;">Descripción Estado Solicitud</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($inscripciones as $inscripcion)
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->id }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <a href="{{ route('inscripciones.show', $inscripcion->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <strong>{{ $inscripcion->name }} 
                                                @if($inscripcion->name2) {{ $inscripcion->name2 }} @endif
                                                {{ $inscripcion->apellido }} 
                                                @if($inscripcion->apellido2) {{ $inscripcion->apellido2 }} @endif</strong>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->numero_identidad }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->email }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->telefono_celular }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $inscripcion->estado }}</td>
                                            <td class="text-center" >{{ $inscripcion->descripcion_estado_solicitud }}</td>                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
