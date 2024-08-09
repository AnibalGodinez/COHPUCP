@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">

                <div class="card shadow-lg">
                    <div class="card-header text-white text-center">
                        <h3 class="card-title"><strong>LISTA DE ROLES</strong></h3>
                    </div>

                    {{-- Mensajes de éxito --}}
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        {{-- Formulario de búsqueda --}}
                        <form method="GET" action="{{ route('roles.ver') }}" class="form-inline mt-3">
                            <input type="text" name="search" class="form-control mr-2 col-2" placeholder="Buscar roles" value="{{ request()->query('search') }}">
                            <button class="btn btn-info btn-round btn-simple">
                                <i class="tim-icons icon-zoom-split"></i> Buscar
                            </button>
                        </form><br>

                            @if($roles->isEmpty())
                                <div class="alert alert-default text-center" role="alert">
                                    No hay ningún resultado de su búsqueda.
                                </div>
                            @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $roles->links('paginacion.simple-bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
