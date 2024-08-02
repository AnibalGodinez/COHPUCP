@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">CONTENIDO DE LA PÁGINA HOME</h3>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('dashboard-content.create') }}" class="btn btn-info btn-simple btn-round">
                            <i class="fas fa-plus"></i> Agregar nuevo contenido
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped mt-4">
                            <thead>
                                <tr>
                                    <th class="text-center">Diseño</th>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Subtítulo</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Archivo pdf</th>
                                    <th class="text-center">Imagen</th>
                                    <th class="text-center">Vídeo</th>
                                    <th class="text-center">Links</th>
                                    <th class="text-center">Facebook</th>
                                    <th class="text-center">Twitter</th>
                                    <th class="text-center">Youtube</th>
                                    <th class="text-center">Whatsapp</th>
                                    <th class="text-center">Instagram</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dashboardContents as $dashboardContent)
                                    <tr>
                                        <td class="text-center">{{ $dashboardContent->layout }}</td>
                                        <td>{{ $dashboardContent->title }}</td>
                                        <td>{{ $dashboardContent->subtitle }}</td>
                                        <td>{{ $dashboardContent->description }}</td>
                                        <td>{{ $dashboardContent->pdf }}</td>
                                        <td class="text-center">
                                            @if($dashboardContent->images)
                                                <img src="{{ asset('storage/' . $dashboardContent->images) }}" alt="{{ $dashboardContent->title }}" width="100">
                                            @else
                                                Sin imagen
                                            @endif
                                        </td>
                                        <td>{{ $dashboardContent->videos }}</td>
                                        <td>{{ $dashboardContent->links }}</td>
                                        <td>{{ $dashboardContent->facebook_link }}</td>
                                        <td>{{ $dashboardContent->twitter_link }}</td>
                                        <td>{{ $dashboardContent->youtube_link }}</td>
                                        <td>{{ $dashboardContent->whatsapp_link }}</td>
                                        <td>{{ $dashboardContent->instagram_link }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard-content.edit', $dashboardContent->id) }}" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-settings"></i>
                                            </a>
    
                                            <form action="{{ route('dashboard-content.destroy', $dashboardContent->id) }}" method="POST" style="display:inline;">
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
