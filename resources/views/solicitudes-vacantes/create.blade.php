@extends('layouts.app')

@section('content')
    <h1>Crear nueva solicitud de vacante</h1>

    <form action="{{ route('solicitudes-vacantes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre_empresa">Nombre de la Empresa</label>
            <input type="text" name="nombre_empresa" class="form-control" value="{{ old('nombre_empresa') }}" required>
        </div>

        <div class="form-group">
            <label for="nombre_vacante">Nombre de la Vacante</label>
            <input type="text" name="nombre_vacante" class="form-control" value="{{ old('nombre_vacante') }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-group">
            <label for="responsabilidades">Responsabilidades</label>
            <textarea name="responsabilidades" class="form-control" required>{{ old('responsabilidades') }}</textarea>
        </div>

        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <textarea name="requisitos" class="form-control" required>{{ old('requisitos') }}</textarea>
        </div>

        <div class="form-group">
            <label for="experiencia">Experiencia</label>
            <textarea name="experiencia" class="form-control" required>{{ old('experiencia') }}</textarea>
        </div>

        <div class="form-group">
            <label for="tiempo">Tiempo</label>
            <input type="text" name="tiempo" class="form-control" value="{{ old('tiempo') }}" required>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <textarea name="ubicacion" class="form-control" required>{{ old('ubicacion') }}</textarea>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ old('celular') }}" required>
        </div>

        <div class="form-group">
            <label for="enlace">Enlace</label>
            <input type="text" name="enlace" class="form-control" value="{{ old('enlace') }}">
        </div>

        <button type="submit" class="btn btn-primary">Crear Vacante</button>
    </form>
@endsection
