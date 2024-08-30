@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 770px;">CONTENIDO DEL DASBOARD</h3>
                            <a href="{{ route('dashboard-content.create') }}" class="btn btn-info btn-round btn-simple">
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr>
                                            @foreach (['Diseño', 'Título', 'Subtítulo', 'Descripción', 'Archivo pdf', 'Imagen', 'Vídeo', 'Links', 'Facebook', 'Twitter', 'Youtube', 'Whatsapp', 'Instagram', 'Acciones'] as $header)
                                                <th class="text-center" style="width: 120px;">{{ $header }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dashboardContents as $dashboardContent)
                                            <tr>
                                                <td class="text-center" style="width: 120px;">{{ $dashboardContent->layout }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->title }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->subtitle }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->description }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->pdf }}</td>
                                                <td class="text-center" style="width: 120px;">
                                                    @if($dashboardContent->images)
                                                        <img src="{{ asset('storage/' . $dashboardContent->images) }}" alt="{{ $dashboardContent->title }}" width="100">
                                                    @endif
                                                </td>                                            
                                                <td style="width: 120px;">{{ $dashboardContent->videos }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->links }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->facebook_link }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->twitter_link }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->youtube_link }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->whatsapp_link }}</td>
                                                <td style="width: 120px;">{{ $dashboardContent->instagram_link }}</td>                                       
                                                <td class="text-center" style="width: 120px;">
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
        </div>
    </div>
@endsection
