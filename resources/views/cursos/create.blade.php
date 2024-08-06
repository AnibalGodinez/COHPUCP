@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Curso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="layout">Diseño</label>
                <select name="layout" id="layout" class="form-control">
                    <option value="">Seleccionar diseño</option>
                    <option value="Imagen de fondo" {{ old('layout') == 'Imagen de fondo' ? 'selected' : '' }}>Imagen de fondo</option>
                    <option value="Imagen con texto" {{ old('layout') == 'Imagen con texto' ? 'selected' : '' }}>Imagen con texto</option>
                    <option value="Texto con enlaces" {{ old('layout') == 'Texto con enlaces' ? 'selected' : '' }}>Texto con enlaces</option>
                </select>
                @error('layout')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}">
                @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio') }}">
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="enlace">Enlace</label>
                <input type="text" name="enlace" id="enlace" class="form-control" value="{{ old('enlace') }}">
                @error('enlace')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="icono">Icono</label>
                <input type="text" name="icono" id="icono" class="form-control" value="{{ old('icono') }}">
                @error('icono')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="calificacion">Calificación</label>
                <input type="text" name="calificacion" id="calificacion" class="form-control" value="{{ old('calificacion') }}">
                @error('calificacion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="idioma_id">Idioma</label>
                <select name="idioma_id" id="idioma_id" class="form-control">
                    <option value="">Seleccionar idioma</option>
                    @foreach($idiomas as $idioma)
                        <option value="{{ $idioma->id }}" {{ old('idioma_id') == $idioma->id ? 'selected' : '' }}>
                            {{ $idioma->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('idioma_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                    <option value="">Seleccionar categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
