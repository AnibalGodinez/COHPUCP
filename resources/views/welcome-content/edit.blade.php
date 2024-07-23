@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px">
        <h1 class="text-center">Editar contenido de la Página de Inicio</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('welcome-content.update', $welcomeContent->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control" value="{{ $welcomeContent->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" class="form-control" required>{{ $welcomeContent->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" name="image" class="form-control">
                @if($welcomeContent->image_path)
                    <img src="{{ asset('storage/' . $welcomeContent->image_path) }}" alt="{{ $welcomeContent->title }}" width="200">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('welcome-content.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
