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

                        <div class="form-group">
                            <label for="layout"><strong>DISEÑO:</strong></label>
                            <select 
                                name="layout" 
                                id="layout"
                                class="form-control"
                                onchange="toggleFields()">
                                <option disabled value="">Seleccione el diseño</option>
                                <option value="Imagen de fondo" {{ old('layout', $curso->layout) == 'Imagen de fondo' ? 'selected' : '' }}>Imagen de fondo</option>
                                <option value="Imagen a la derecha" {{ old('layout', $curso->layout) == 'Imagen a la derecha' ? 'selected' : '' }}>Imagen a la derecha</option>
                                <option value="Tarjetas de cursos" {{ old('layout', $curso->layout) == 'Tarjetas de cursos' ? 'selected' : '' }}>Tarjetas de cursos</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" placeholder="titulo" value="{{ $curso->titulo }}">
                                    @error('titulo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

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
                                    <input type="text" name="enlace" class="form-control" placeholder="Ingrese el enlace" value="{{ $curso->enlace }}">
                                    @error('enlace')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icono</label>
                                    <input type="text" name="icono" class="form-control" placeholder="ingrese el enlace del icono" value="{{ $curso->icono }}">
                                    @error('icono')
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

                        <!-- Campo para el Idioma -->
                        <div class="form-group col-md-3 p-4">
                            <label for="idioma">
                                <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                <strong>PAÍS *</strong>
                            </label>
                            <select id="idioma" name="idioma_id" class="form-control">
                                <option value="">Seleccione el idioma</option>
                                @foreach($idiomas as $idioma)
                                    <option value="{{ $idioma->id }}"  {{ $user->idioma == $idioma->id ? 'selected' : '' }}>
                                        {{ $idioma->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo para el Categoría -->
                        <div class="form-group col-md-3 p-4">
                            <label for="categoria">
                                <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                <strong>PAÍS *</strong>
                            </label>
                            <select id="categoria" name="categoria_id" class="form-control">
                                <option value="">Seleccione la categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"  {{ $user->categoria == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
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
