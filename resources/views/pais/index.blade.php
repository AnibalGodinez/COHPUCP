@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 835px;">LISTA DE PAÍSES</h3>
                            <a href="{{ route('pais.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Agregar nuevo país
                            </a>
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
                                
                        <!-- Formulario de búsqueda -->
                        <form action="{{ url('pais') }}" method="GET" class="form-inline mt-3">
                            <input type="text" name="search" class="form-control mr-2 col-3" placeholder="Buscar por nombre o código" value="{{ request()->query('search') }}">
                            <button class="btn btn-info btn-round btn-simple" type="submit">
                                <i class="tim-icons icon-zoom-split"></i> Buscar
                            </button>
                        </form>

                        <br>

                        @if($paises->isEmpty())
                            <div class="alert alert-info text-center">
                                No se encontraron países que coincidan con tu búsqueda.
                            </div>
                        @else
                            <table class="table table-bordered table-striped" style="border-spacing: 8cm;">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Nombre del país</th>
                                        <th class="text-center" style="color: white;">Código telefónico</th>
                                        <th class="text-center" style="color: white;">Acciones</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($paises as $pais)
                                        <tr>
                                            <td class="text-center">{{ $pais->id }}</td>
                                            <td class="text-center">{{ $pais->nombre }}</td>
                                            <td class="text-center">{{ $pais->codigo }}</td>                            
                                            <td class="text-center">
                                                <a href="{{ url('pais/'.$pais->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                                <form action="{{ route('pais.destroy', $pais->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirm('¿Estás seguro de que deseas eliminar este país? Esta acción no se puede deshacer.')">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </form>                                          
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Paginación -->
                            {{ $paises->links('paginacion.simple-bootstrap-4') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
