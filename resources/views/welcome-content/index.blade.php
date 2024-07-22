@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contenido de la Página de Inicio</h1>
        <a href="{{ route('welcome-content.create') }}" class="btn btn-primary">Añadir Contenido</a>
        @foreach($contents as $content)
            <div>
                <h2>{{ $content->title }}</h2>
                <p>{{ $content->description }}</p>
                @if($content->image_path)
                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" width="200">
                @endif
                <a href="{{ route('welcome-content.edit', $content->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('welcome-content.destroy', $content->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
