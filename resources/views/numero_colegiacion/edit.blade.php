@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Número de Colegiación</h1>
    <form action="{{ route('numero_colegiacion.update', $numeroColegiacion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="numero_colegiacion" class="form-label">Número de Colegiación</label>
            <input type="text" name="numero_colegiacion" id="numero_colegiacion" class="form-control" value="{{ $numeroColegiacion->numero_colegiacion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
