@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 88px">
            <div class="col-md-12">
                <div class="card m-7">

                    <div class="card-body">
                        <h3 class="card-title text-center">GESTIÓN DE IDIOMAS</h3>
                    
                     {{-- Mensajes de éxito --}}
                     @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <a href="{{ route('idiomas.create') }}" class="btn btn-info btn-round btn-simple">
                            <i class="fas fa-plus-circle"></i> Crear idioma
                        </a>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre del idioma</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($idiomas as $idioma)
                                <tr>
                                    <td class="text-center">{{ $idioma->id }}</td>
                                    <td class="text-center">{{ $idioma->nombre }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('idiomas.edit', $idioma) }}" class="btn btn-success btn-sm btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </a>

                                        <form action="{{ route('idiomas.destroy', $idioma) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $idioma->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirmDelete({{ $idioma->id }})">
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

<script>
    function confirmDelete(idiomaId) {
        return confirm('¿Estás seguro que deseas eliminar este idioma? Esta acción no se puede deshacer.');
    }
</script>
@endsection
