@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">

                <div class="card shadow-lg">
                    <div class="card-header text-white text-center">
                        <h3 class="card-title"><strong>LISTA DE ROLES</strong></h3>
                    </div>

                    <!-- Mensaje de éxito -->
                    @if(session('status'))
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                            {{ session('status') }}
                            <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
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
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">Nombre del rol</th>
                                        <th class="text-center" style="color: white;">Descripción</th>
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
