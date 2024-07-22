@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Añadir Contenido de la Página de Inicio</h1>
        <form action="{{ route('welcome-content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Imagen:</label>
                <input type="file" name="image_path" class="form-control">
            </div>            
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
