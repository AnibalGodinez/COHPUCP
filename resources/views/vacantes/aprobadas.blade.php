@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white text-center">
                        <h3 class="card-title" style="color: white"><strong>VACANTES APROBADAS</strong></h3>
                    </div>

                    @if ($vacantesAprobadas->isEmpty())
                        <div class="text-center">
                            <p>No hay vacantes aprobadas en este momento.</p>
                        </div>
                    @else

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre de la Empresa</th>
                                    <th>Nombre de la Vacante</th>
                                    <th>Ubicación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacantesAprobadas as $vacante)
                                    <tr>
                                        <td>{{ $vacante->nombre_empresa }}</td>
                                        <td>{{ $vacante->nombre_vacante }}</td>
                                        <td>{{ $vacante->ubicacion }}</td>
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
@endsection
