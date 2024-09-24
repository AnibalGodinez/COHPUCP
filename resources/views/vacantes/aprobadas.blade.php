@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">
                <div class="card-body">
                    <h3 class="text-center">LISTA DE SOLICITUDES - VACANTES APROBADAS</h3>

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

                        @if ($vacantesAprobadas->isEmpty())
                            <div class="text-center">
                                <p>No hay vacantes aprobadas en este momento.</p>
                            </div>
                        @else

                        <table class="table table-bordered table-striped" style="border-spacing: 8cm;">
                            <thead style="background-color: #3288af;">
                                <tr>
                                    <th class="text-center" style="color: white;">ID</th>
                                    <th class="text-center" style="color: white;">Nombre de la Empresa</th>
                                    <th class="text-center" style="color: white;">Nombre de la Vacante</th>
                                    <th class="text-center" style="color: white;">Ubicación</th>
                                    <th class="text-center" style="color: white;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacantesAprobadas as $vacante)
                                    <tr>
                                        <td class="text-center">{{ $vacante->id }}</td>
                                        <td class="text-center">{{ $vacante->nombre_empresa }}</td>
                                        <td class="text-center">{{ $vacante->nombre_vacante }}</td>
                                        <td class="text-center">{{ $vacante->ubicacion }}</td>
                                        <td>
                                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="btn btn-info btn-sm">
                                                Ver detalles
                                            </a>
                                            <a href="{{ route('vacantes.edit', $vacante->id) }}" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>
                                            <form action="{{ route('vacantes.destroy', $vacante->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta vacante?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
