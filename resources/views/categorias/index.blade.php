@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 88px">
            <div class="col-md-12">
                <div class="card m-7">

                    <div class="card-body">
                        <h3 class="card-title text-center">GESTIÓN DE LAS CATEGORÍAS</h3>
                    
                     {{-- Mensajes de éxito --}}
                     @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <a href="{{ route('categorias.create') }}" class="btn btn-info btn-round btn-simple">
                            <i class="fas fa-plus-circle"></i> Crear categoría
                        </a>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre de la categoría</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td class="text-center">{{ $categoria->id }}</td>
                                    <td class="text-center">{{ $categoria->nombre }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-success btn-sm btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </a>

                                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $categoria->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirmDelete({{ $categoria->id }})">
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
    function confirmDelete(categoriaId) {
        return confirm('¿Estás seguro que deseas eliminar esta categoría? Esta acción no se puede deshacer.');
    }
</script>
@endsection
