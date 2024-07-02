@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Agregar nueva pregunta de seguridad</h3>
                </div>  
                <div class="card-body">
                    <form action="{{ route('security_questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Pregunta de Seguridad</label>
                            <input type="text" name="question" id="question" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Guardar Pregunta</button>
                            <a href="{{ route('security_questions.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
