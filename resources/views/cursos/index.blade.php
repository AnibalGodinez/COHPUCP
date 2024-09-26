@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px;">
        <div class="col-md-12">
            <div class="card m-7">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <h3 class="card-title"><strong>Lista de cursos</strong></h3>
                    </div>

                    <hr style="border: 1px solid #ddd;"> <!-- Línea horizontal -->

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
                    <form action="{{ url('cursos') }}" method="GET" class="form-inline mt-3">
                        <input type="text" name="search" class="form-control mr-2 col-2" placeholder="Buscar cursos..." value="{{ request()->query('search') }}">
                        <button class="btn btn-info btn-round btn-simple" type="submit">
                            <i class="tim-icons icon-zoom-split"></i> Buscar
                        </button>
                    </form>

                    @if($cursos->isEmpty())
                        <div class="alert alert-info text-center" role="alert">
                            No hay ningún curso
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">Diseño</th>
                                        <th class="text-center" style="color: white;">Título de los cursos</th>
                                        <th class="text-center" style="color: white;">Nombre del curso</th>
                                        <th class="text-center" style="color: white;">Descripción</th>
                                        <th class="text-center" style="color: white;">Precio</th>
                                        <th class="text-center" style="color: white;">Enlace</th>
                                        <th class="text-center" style="color: white;">Icono</th>
                                        <th class="text-center" style="color: white;">Calificación</th>
                                        <th class="text-center" style="color: white;">Idioma</th>
                                        <th class="text-center" style="color: white;">Categoría</th>
                                        <th class="text-center" style="color: white;">Imagen</th>
                                        <th class="text-center" style="color: white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap;">{{ $curso->layout }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $curso->titulo }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $curso->nombre }}</td>
                                            <td class="text-center">{{ $curso->descripcion }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $curso->precio }}</td>
                                            <td class="text-center"><a href="{{ $curso->enlace }}" target="_blank">{{ $curso->enlace }}</a></td>
                                            <td class="text-center" style="white-space: nowrap;"><a href="{{ $curso->icono }}" target="_blank">{{ $curso->icono }}</a></td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $curso->calificacion }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $curso->idioma ? $curso->idioma->nombre : 'No asignado' }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $curso->categoria ? $curso->categoria->nombre : 'No asignado' }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                @if ($curso->imagen)
                                                    <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="Imagen del curso" style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    Sin imagen
                                                @endif
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <!-- Botón para editar el curso -->
                                                <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-success btn-sm btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                                <!-- Formulario para eliminar el curso -->
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
                    @endif
                </div><br>
                {{ $cursos->links('paginacion.simple-bootstrap-4') }} <br>
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
