@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center" style="margin-top: 88px">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title"><strong>EDITAR IDIOMA</strong></h3>
                </div>

                {{-- Mensajes de error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('idiomas.update', $idioma->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre"><strong>NOMBRE DEL IDIOMA *</strong></label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $idioma->nombre) }}">
                        </div>

                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save" style="margin-right: 8px;"></i>
                                Guardar cambios
                            </button>

                        <a href="{{ route('idiomas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                            Volver
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
