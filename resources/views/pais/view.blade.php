@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 88px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <!-- Contenedor principal para centrar el título -->
                        <div class="position-relative mb-4">
                            <!-- Botón "Regresar" alineado a la derecha -->
                            <a href="{{ route('pais.index') }}" class="btn btn-info btn-round btn-simple position-absolute" style="top: 0; right: 0;">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
                            <h3 class="card-title text-center">LISTA DE PAÍSES</h3>
                        </div><br>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Código</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises as $pais)
                                    <tr>
                                        <td class="text-center">{{ $pais->id }}</td>
                                        <td class="text-center">{{ $pais->nombre }}</td>
                                        <td class="text-center">{{ $pais->codigo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
