@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3>LISTA DE SOLICITUDES DE INSCRIPCIÓN DE FIRMAS</h3>
                        </div>
            
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%;">
                                
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Nombre del Solictante</th>
                                        <th class="text-center" style="color: white;">Nombre Sociedad</th>
                                        <th class="text-center" style="color: white;">Celular</th>
                                        <th class="text-center" style="color: white;">Correo electrónico</th>
                                        <th class="text-center" style="color: white;">Estado</th>
                                        <th class="text-center" style="color: white;">Descripción Estado Solicitud</th>
                                        <th class="text-center" style="color: white;">Ver solicitud</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($inscripcionFirmas as $inscripcionFirma)
                                        <tr>
                                            <td>{{ $inscripcionFirma->id }}</td>
                                            <td>{{ $inscripcionFirma->user->name }} {{ $inscripcionFirma->user->name2 }} {{ $inscripcionFirma->user->apellido }} {{ $inscripcionFirma->user->apellido2 }}</td>
                                            <td>{{ $inscripcionFirma->nombre_sociedad }}</td>
                                            <td>{{ $inscripcionFirma->celular }}</td>
                                            <td>{{ $inscripcionFirma->email }}</td>
                                            <td>{{ ($inscripcionFirma->estado) }}</td>
                                            <td>{{ $inscripcionFirma->descripcion_estado_solicitud }}</td>

                                            <td class="text-center">
                                                <!-- Botón para ver los detalles de la inscripción -->
                                                <a href="{{ route('inscripcion_firmas.show', $inscripcionFirma->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
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
