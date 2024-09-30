@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">

                <div class="card-header d-flex justify-content-center align-items-center py-3" style="background-color: #b1b3b6; border-bottom: 1px solid #7e7979;">
                    <h3 class="card-title"><strong>Lista de vacantes aprobadas</strong></h3>
                </div>

                @if ($vacantesAprobadas->isEmpty())
                    <div class="text-center">
                        <p>No hay vacantes aprobadas en este momento.</p>
                    </div>
                @else

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Nombre de la Empresa</th>
                                        <th class="text-center" style="color: white;">Nombre de la Vacante</th>
                                        <th class="text-center" style="color: white;">Ubicación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacantesAprobadas as $vacante)
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap;">{{ $vacante->id }}</td>
                                            <td class="text-center" style="white-space: nowrap;"><strong>{{ $vacante->nombre_empresa }}</strong></td>
                                            <td class="text-center" style="white-space: nowrap;"><strong>{{ $vacante->nombre_vacante }}</strong></td>
                                            <td class="text-center">{{ $vacante->ubicacion }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif             
            </div>
        </div>
    </div>
</div>
@endsection
