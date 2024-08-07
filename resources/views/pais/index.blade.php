@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 88px">
            <div class="col-md-12">
                <div class="card m-7">

                    <div class="card-body">
                        <h3 class="card-title text-center">GESTIÓN DE PAÍSES</h3>

                        <div class="mb-3">
                            <a href="{{ route('pais.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Crear país
                            </a>
                            <a href="{{ route('pais.view') }}" class="btn btn-info btn-round btn-simple position-absolute" style="top: 0; right: 0;">
                                <i class="fas fa-eye"></i> Ver países
                            </a>
                        </div>

                        {{-- Mensajes de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                                
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($paises as $pais)
                                    <tr>
                                        <td class="text-center">{{ $pais->id }}</td>
                                        <td class="text-center">{{ $pais->nombre }}</td>
                                        <td class="text-center">{{ $pais->codigo }}</td>
                                        
                                        <td class="text-center">

                                            <a href="{{ route('pais.edit', $pais) }}" class="btn btn-info">Editar</a>
                                            <form action="{{ route('pais.destroy', $pais) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $pais->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete({{ $pais->id }})">Eliminar</button>
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

    <script>
        function confirmDelete(paisId) {
            return confirm('¿Estás seguro que deseas eliminar este país? Esta acción no se puede deshacer.');
        }
    </script>
@endsection
