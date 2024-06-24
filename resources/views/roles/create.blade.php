@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Crear Rol</h3>
                </div>   

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('roles') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre del Rol</label>
                            <input type="text" id="name" name="name" class="form-control" style="max-width: 300px;" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción del Rol</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info">Guardar</button>
                            <a href="{{ url('roles') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
