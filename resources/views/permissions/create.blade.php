@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
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
                            <label for="name"><strong>NOMBRE DEL PERMISO *</strong></label>
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
                            <label for="description"><strong>DESCRIPCIÓN DEL PERMISO</strong></label>
                            <textarea 
                            id="description" 
                            name="description" 
                            class="form-control" 
                            rows="12" 
                            placeholder="Ingrese la descripción del permiso">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar
                                </button>
                                <a href="{{ route('permission.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                    Volver
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
