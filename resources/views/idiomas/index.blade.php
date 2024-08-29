@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 824px;">LISTA DE IDIOMAS</h3>
                            <a href="{{ route('idiomas.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Agregar nuevo idioma
                            </a>
                        </div><br>
                    
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

                        <table class="table table-bordered table-striped">
                            <thead style="background-color: #3288af;">
                                <tr>
                                    <th class="text-center" style="color: white;">ID</th>
                                    <th class="text-center" style="color: white;">Nombre del idioma</th>
                                    <th class="text-center" style="color: white;">Acciones</th>
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
