@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px">
        <h1 class="text-center">Añadir contenido a la Página de Inicio</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('welcome-content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group" style="height:50%">
                <label for="description">Descripción:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Imagen:</label>
                <input type="file" name="image_path" class="form-control">
            </div>            
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('welcome-content.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
