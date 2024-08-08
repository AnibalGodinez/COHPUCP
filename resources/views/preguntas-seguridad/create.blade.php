@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center">
                    <h3 class="card-title"><strong>CREAR UNA PREGUNTA DE SEGURIDAD</strong></h3>
                </div><br>

                <div class="card-body">
                    <form action="{{ route('security_questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question"><strong>PREGUNTA DE SEGURIDAD</strong></label>
                            <input type="text" name="question" id="question" class="form-control" required>
                        </div><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar
                                </button>
                                <a href="{{ route('security_questions.index') }}" class="btn btn-secondary">
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

