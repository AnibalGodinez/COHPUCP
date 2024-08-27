@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <h3>LISTA DE USUARIOS SIN Nº DE COLEGIACIÓN</h3>
                        </div>

                        <!-- Mensaje de éxito -->
                        @if(session('status'))
                        <div class="text-center mb-3">
                            <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                                {{ session('status') }}
                                <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Asignar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuariosSinColegiacion as $usuario)
                                    <tr>
                                        <td class="text-center">{{ $usuario->id }}</td>
                                        <td class="text-center">{{ $usuario->name }} {{ $usuario->name2 }} {{ $usuario->apellido }} {{ $usuario->apellido2 }}</td>
                                        <td class="text-center">{{ $usuario->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('numero_colegiacion.create', ['user_id' => $usuario->id]) }}" class="btn btn-info">Asignar Número de Colegiación</a>
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
@endsection
