@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">

                <div class="card-header d-flex justify-content-center align-items-center py-3" style="background-color: #b1b3b6; border-bottom: 1px solid #7e7979;">
                    <h3 class="card-title"><strong>Lista de vacantes pendientes</strong></h3>
                </div>

                <!-- Mensaje de éxito -->
                @if(session('success'))
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                            {{ session('success') }}
                            <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                @endif

                @if($solicitudes->isEmpty())
                    <div class="text-center">
                        <p>No hay solicitudes pendientes en este momento.</p>
                    </div>
                @else

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Ver</th>
                                        <th class="text-center" style="color: white;">Editar</th>
                                        <th class="text-center" style="color: white;">Eliminar</th>
                                        <th class="text-center" style="color: white;">Nombre de la empresa</th>
                                        <th class="text-center" style="color: white;">Nombre de la vacante</th>
                                        <th class="text-center" style="color: white;">Ubicación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudes as $solicitud)
                                        <tr>
                                            <td class="text-center">{{ $solicitud->id }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <!-- Botón Ver con icono del ojo -->
                                                <a href="{{ route('vacantes.show', $solicitud->id) }}" class="btn btn-info btn-sm btn-icon">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <!-- Botón Editar con icono de engranaje -->
                                                <a href="{{ route('vacantes.edit', $solicitud->id) }}" class="btn btn-success btn-sm btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <!-- Botón Eliminar con confirmación -->
                                                <form action="{{ route('vacantes.destroy', $solicitud->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">
                                                            <i class="tim-icons icon-simple-remove"></i>
                                                        </button>
                                                </form>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;"><strong>{{ $solicitud->nombre_empresa }}</strong></td>
                                            <td class="text-center" style="white-space: nowrap;"><strong>{{ $solicitud->nombre_vacante }}</strong></td>
                                            <td class="text-center">{{ $solicitud->ubicacion }}</td>                      
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
