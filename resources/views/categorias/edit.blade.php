@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row" style="margin-top: 88px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <h3 class="card-title text-center">EDITAR CATEGORÍA</h3>

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

                        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre de la categoría:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}">
                            </div>

                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save" style="margin-right: 8px;"></i>
                                Actualizar
                            </button>

                            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
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
