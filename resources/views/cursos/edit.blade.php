@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Editar Curso</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('cursos.update', $curso->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $curso->nombre }}">
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" class="form-control" placeholder="Descripción">{{ $curso->descripcion }}</textarea>
                                    @error('descripcion')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" name="precio" class="form-control" placeholder="Precio" value="{{ $curso->precio }}">
                                    @error('precio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enlace</label>
                                    <input type="text" name="enlace" class="form-control" placeholder="Enlace" value="{{ $curso->enlace }}">
                                    @error('enlace')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Calificación</label>
                                    <input type="text" name="calificacion" class="form-control" placeholder="Calificación" value="{{ $curso->calificacion }}">
                                    @error('calificacion')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Idioma</label>
                                    <input type="text" name="idioma" class="form-control" placeholder="Idioma" value="{{ $curso->idioma }}">
                                    @error('idioma')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" name="imagen" class="form-control">
                                    @error('imagen')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @if($curso->imagen)
                                        <img src="{{ asset('storage/'.$curso->imagen) }}" alt="Imagen del curso" style="max-width: 200px; margin-top: 10px;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Guardar</button>
                            <a href="{{ route('cursos.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
