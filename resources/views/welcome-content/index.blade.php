@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px">
        <h1 class="text-center">Contenido de la Página de Inicio</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('welcome-content.create') }}" class="btn btn-dark mb-3 btn-simple">
            <i class="fas fa-plus"></i> Añadir Contenido
        </a>
        @foreach($contents as $content)
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title text-center">{{ $content->title }}</h2>
                    <p class="card-text">{!! nl2br(e($content->description)) !!}</p>
                    @if($content->image_path)
                        <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                    @endif
                    <a href="{{ route('welcome-content.edit', $content->id) }}" class="btn btn-info btn-sm">Editar</a>
                    <form action="{{ route('welcome-content.destroy', $content->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este contenido?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
