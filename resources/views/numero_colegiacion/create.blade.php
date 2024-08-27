@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Número de Colegiación</h1>
    <form action="{{ route('numero_colegiacion.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numero_colegiacion" class="form-label">Número de Colegiación</label>
            <input type="text" name="numero_colegiacion" id="numero_colegiacion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
