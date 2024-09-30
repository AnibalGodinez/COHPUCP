@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px;">
            <div class="col-md-12">
                <div class="card m-7">
                        
                    <div class="card-header d-flex justify-content-center align-items-center py-3" style="background-color: #b1b3b6; border-bottom: 1px solid #7e7979;">
                        <h3 class="card-title"><strong>Solicitudes de inscripción de Firmas de Auditorías</strong></h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Ver</th>
                                        <th class="text-center" style="color: white;">Nombre del Solicitante</th>
                                        <th class="text-center" style="color: white;">Nombre Sociedad</th>
                                        <th class="text-center" style="color: white;">Celular</th>
                                        <th class="text-center" style="color: white;">Correo electrónico</th>
                                        <th class="text-center" style="color: white;">Estado</th>
                                        <th class="text-center" style="color: white;">Descripción Estado Solicitud</th>                                      
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($inscripcionFirmas as $inscripcionFirma)
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap;">{{ $inscripcionFirma->id }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('inscripcion_firmas.show', $inscripcionFirma->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $inscripcionFirma->user->name }} 
                                                {{ $inscripcionFirma->user->name2 }} 
                                                {{ $inscripcionFirma->user->apellido }} 
                                                {{ $inscripcionFirma->user->apellido2 }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <strong>{{ $inscripcionFirma->nombre_sociedad }}</strong>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $inscripcionFirma->celular }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $inscripcionFirma->email }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $inscripcionFirma->estado }}
                                            </td>
                                            <td>{{ $inscripcionFirma->descripcion_estado_solicitud }}</td>                                            
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
