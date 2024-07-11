@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title"><strong>CREAR PERMISO</strong></h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger mx-4 mt-3">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('status'))
                        <div class="alert alert-success mx-4 mt-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('permission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name"><strong>Nombre del permiso *</strong></label>
                            <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control" 
                            style="max-width: 300px;" 
                            value="{{ old('name') }}" 
                            placeholder="Ingrese el nombre del permiso"
                            required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description"><strong>Descripción del permiso</strong></label>
                            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Ingrese una descripción del permiso">{{ old('description') }}</textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ url('permission') }}" class="btn btn-danger px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
