@extends('layouts.app')

@section('content')
    <h1>Editar solicitud de vacante</h1>

    <form action="{{ route('solicitudes-vacantes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_empresa">Nombre de la Empresa</label>
            <input type="text" name="nombre_empresa" class="form-control" value="{{ old('nombre_empresa', $solicitud->nombre_empresa) }}" required>
        </div>

        <div class="form-group">
            <label for="nombre_vacante">Nombre de la Vacante</label>
            <input type="text" name="nombre_vacante" class="form-control" value="{{ old('nombre_vacante', $solicitud->nombre_vacante) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $solicitud->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="responsabilidades">Responsabilidades</label>
            <textarea name="responsabilidades" class="form-control" required>{{ old('responsabilidades', $solicitud->responsabilidades) }}</textarea>
        </div>

        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <textarea name="requisitos" class="form-control" required>{{ old('requisitos', $solicitud->requisitos) }}</textarea>
        </div>

        <div class="form-group">
            <label for="experiencia">Experiencia</label>
            <textarea name="experiencia" class="form-control" required>{{ old('experiencia', $solicitud->experiencia) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tiempo">Tiempo</label>
            <input type="text" name="tiempo" class="form-control" value="{{ old('tiempo', $solicitud->tiempo) }}" required>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <textarea name="ubicacion" class="form-control" required>{{ old('ubicacion', $solicitud->ubicacion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $solicitud->correo) }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $solicitud->telefono) }}" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ old('celular', $solicitud->celular) }}" required>
        </div>

        <div class="form-group">
            <label for="enlace">Enlace</label>
            <input type="text" name="enlace" class="form-control" value="{{ old('enlace', $solicitud->enlace) }}">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente" {{ old('estado', $solicitud->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="aprobado" {{ old('estado', $solicitud->estado) == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="rechazado" {{ old('estado', $solicitud->estado) == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Solicitud</button>
    </form>
@endsection
