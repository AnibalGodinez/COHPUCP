@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">
                <div class="card-body">
                    <h3 class="text-center">LISTA DE USUARIOS SIN NÚMERO DE COLEGIACIÓN</h3>

                            <!-- Formulario de búsqueda -->
                            <form action="{{ route('numero_colegiacion.index') }}" method="GET" class="form-inline">
                                <input type="text" name="search" class="form-control" placeholder="Buscar usuario..." value="{{ request('search') }}">
                                <button class="btn btn-info btn-round btn-simple">
                                    <i class="tim-icons icon-zoom-split"></i> Buscar
                                </button>
                            </form>


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
                            <thead style="background-color: #3288af;">
                                <tr>
                                    <th class="text-center" style="color: white;">ID</th>
                                    <th class="text-center" style="color: white;">Usuario</th>
                                    <th class="text-center" style="color: white;">DNI</th>
                                    <th class="text-center" style="color: white;">Celular</th>
                                    <th class="text-center" style="color: white;">Email</th>
                                    <th class="text-center" style="color: white;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($usuariosSinColegiacion as $usuario)
                                    <tr>
                                        <td class="text-center">{{ $usuario->id }}</td>
                                        <td class="text-center">{{ $usuario->name }} {{ $usuario->name2 }} {{ $usuario->apellido }} {{ $usuario->apellido2 }}</td>
                                        <td class="text-center">{{ $usuario->numero_identidad }}</td>
                                        <td class="text-center">{{ $usuario->telefono_celular }}</td>
                                        <td class="text-center">{{ $usuario->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('numero_colegiacion.create', ['user_id' => $usuario->id]) }}" class="btn btn-default">
                                                <i class="fas fa-arrow-right" style="margin-right: 8px;"></i> Ir asignar
                                            </a>
                                        </td>                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No se encontraron usuarios</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
