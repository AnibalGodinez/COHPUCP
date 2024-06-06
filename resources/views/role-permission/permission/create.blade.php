@extends('layouts.app', ['page' => __('Cursos'), 'pageSlug' => 'cursosPlataforma'])

@section('content')
        <divc class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Crear permisos
                                <a href="{{url('permission')}}" class="btn btn- float-end">Regresar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                                <form action="{{url('permission')}}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label for="">Nombre del permiso</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Guardar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection