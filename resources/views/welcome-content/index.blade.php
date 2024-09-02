@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 720px;">CONTENIDO DE LA PÁGINA DE INICIO</h3>
                            <a href="{{ route('welcome-content.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Crear nuevo contenido
                            </a>
                        </div><br>

                        <!-- Mensaje de éxito -->
                        @if(session('success'))
                        <div class="text-center">
                            <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                                {{ session('success') }}
                                <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        @endif

                        <div class="card-body">
                            <table class="table table-bordered table-striped mt-4">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">Diseño</th>
                                        <th class="text-center" style="color: white;">Título</th>
                                        <th class="text-center" style="color: white;">Descripción</th>
                                        <th class="text-center" style="color: white;">Imagen</th>
                                        <th class="text-center" style="color: white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contents as $content)
                                        <tr>
                                            <td class="text-center">{{ $content->layout }}</td>
                                            <td class="text-center">{{ $content->title }}</td>
                                            <td>{{ $content->description }}</td>
                                            <td class="text-center">
                                                @if($content->image_path)
                                                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" width="100">
                                                @else
                                                    Sin imagen
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('welcome-content.edit', $content->id) }}" class="btn btn-success btn-sm btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>

                                                <form action="{{ route('welcome-content.destroy', $content->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirm('¿Estás seguro de que deseas eliminar este contenido?')">
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
    </div>
@endsection
