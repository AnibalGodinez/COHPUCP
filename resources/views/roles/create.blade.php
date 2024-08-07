@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center" style="margin-top: 88px">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title"><strong>CREAR ROL</strong></h3>
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
                            <label for="name"><strong>Nombre del rol *</strong></label>
                            <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control" 
                            style="max-width: 300px;" 
                            value="{{ old('name') }}" 
                            placeholder="Ingrese el nombre del rol"
                            required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description"><strong>Descripción del rol</strong></label>
                            <textarea 
                            id="description" 
                            name="description" 
                            class="form-control" 
                            rows="4" 
                            placeholder="Ingrese una descripción del rol">{{ old('description') }}</textarea>
                        </div>
                        

                        <div class="mb-3">
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
