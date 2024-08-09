@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 500px;">LISTA DE PAÍSES</h3>
                            <a href="{{ route('pais.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Agregar nuevo país
                            </a>
                        </div><br>

                        {{-- Mensajes de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                                
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre del país</th>
                                    <th class="text-center">Código telefónico</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($paises as $pais)
                                    <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
