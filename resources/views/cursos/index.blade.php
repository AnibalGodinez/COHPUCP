@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 82px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <h3 class="card-title text-center">LISTA DE CURSOS</h3>
                        <div class="mb-3">
                            <a href="{{ route('cursos.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Agregar nuevo curso
                            </a>
                        </div>

                        {{-- Mensajes de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Formulario de búsqueda --}}
                        <form action="{{ url('cursos') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar cursos" value="{{ request()->query('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-round btn-simple">
                                        <i class="tim-icons icon-zoom-split"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Diseño</th>
                                        <th class="text-center">Título</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Enlace</th>
                                        <th class="text-center">icono</th>
                                        <th class="text-center">Calificación</th>
                                        <th class="text-center">Idioma</th>
                                        <th class="text-center">Categoría</th>
                                        <th class="text-center">Imagen</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td class="text-center">{{ $curso->layout }}</td>
                                            <td class="text-center">{{ $curso->titulo }}</td>
                                            <td class="text-center">{{ $curso->nombre }}</td>
                                            <td class="text-center">{{ $curso->descripcion }}</td>
                                            <td class="text-center">{{ $curso->precio }}</td>
                                            <td class="text-center"><a href="{{ $curso->enlace }}" target="_blank">{{ $curso->enlace }}</a></td>
                                            <td class="text-center"><a href="{{ $curso->icono }}" target="_blank">{{ $curso->icono }}</a></td>
                                            <td class="text-center">{{ $curso->calificacion }}</td>
                                            
                                            <td class="text-center">
                                                {{ $curso->idioma ? $curso->idioma->nombre : 'No asignado' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $curso->categoria ? $curso->categoria->nombre : 'No asignado' }}
                                            </td>

                                            <td class="text-center">
                                                @if ($curso->imagen)
                                                    <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="Imagen del curso" style="width: 100px; height: auto;">
                                                @else
                                                    Sin imagen
                                                @endif
                                            </td>

                                            {{-- BOTONES PARA LAS ACCIONES --}}
                                            <td class="text-center">
                                                <!-- Botón para editar el curso -->
                                                <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-success btn-sm btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>

                                                <!-- Formulario para eliminar el curso con confirmación -->
                                                <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $curso->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirmDelete({{ $curso->id }})">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>  
                            </table>
                        </div>          
                        {{ $cursos->links('paginacion.simple-bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete(id) {
        return confirm('¿Estás seguro de que deseas eliminar este curso?');
    }
</script>
