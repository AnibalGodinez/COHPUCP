@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">CONTENIDO DE LA PÁGINA PRINCIPAL</h3>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('welcome-content.create') }}" class="btn btn-info btn-simple btn-round">
                        <i class="fas fa-plus"></i> Agregar nuevo contenido
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th class="text-center">Diseño</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Acciones</th>
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
@endsection
