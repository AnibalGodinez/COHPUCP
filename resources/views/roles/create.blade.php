@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title">Crear rol</h3>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger mx-4 mt-3">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ url('roles') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre del rol</label>
                            <input type="text" id="name" name="name" class="form-control" style="max-width: 300px;" value="{{ old('name') }}" placeholder="Ingrese el nombre del rol">
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Descripción del rol</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Ingrese una descripción del rol">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ url('roles') }}" class="btn btn-danger px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
