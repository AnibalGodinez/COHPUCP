@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <h2 class="mb-4">Editar Inscripción de Firma</h2>
            <form action="{{ route('inscripcion_firmas.update', $inscripcionFirma->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- I. Datos de la sociedad -->
                <div class="form-group">
                    <label for="nombre_sociedad">Nombre de Sociedad</label>
                    <input type="text" class="form-control @error('nombre_sociedad') is-invalid @enderror" id="nombre_sociedad" name="nombre_sociedad" value="{{ old('nombre_sociedad', $inscripcionFirma->nombre_sociedad) }}" required>
                    @error('nombre_sociedad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Agrega más campos de formulario aquí para otros datos de la sociedad -->

                <!-- II. Datos de los socios -->
                <div class="form-group">
                    <label for="primer_nombre_socio1">Primer Nombre del Socio 1</label>
                    <input type="text" class="form-control @error('primer_nombre_socio1') is-invalid @enderror" id="primer_nombre_socio1" name="primer_nombre_socio1" value="{{ old('primer_nombre_socio1', $inscripcionFirma->primer_nombre_socio1) }}" required>
                    @error('primer_nombre_socio1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Agrega más campos de formulario aquí para otros datos de los socios -->

                <!-- Archivos -->
                <div class="form-group">
                    <label for="imagen_firma_socio1">Firma del Socio 1</label>
                    <input type="file" class="form-control @error('imagen_firma_socio1.*') is-invalid @enderror" id="imagen_firma_socio1" name="imagen_firma_socio1[]" multiple>
                    @error('imagen_firma_socio1.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($inscripcionFirma->imagen_firma_socio1)
                        @foreach (json_decode($inscripcionFirma->imagen_firma_socio1) as $imagen)
                            <img src="{{ asset('storage/' . $imagen) }}" alt="Firma Socio 1" style="max-width: 100px;">
                        @endforeach
                    @endif
                </div>
                <!-- Agrega más campos de carga de archivos aquí para otros socios -->

                <!-- Estado de la inscripción -->
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                        <option value="pendiente" {{ old('estado', $inscripcionFirma->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="aprobado" {{ old('estado', $inscripcionFirma->estado) == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                        <option value="rechazado" {{ old('estado', $inscripcionFirma->estado) == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
