@extends('layouts.app', ['page' => __('Capacitaciones'), 'pageSlug' => 'capacitacionesPlataforma'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','capacitaciones']) }}" style="color: rgb(255, 255, 255); background-color: transparent;">Capacitaciones</a></li>
                    <li class="breadcrumb-item">@lang('Editar Capacitación') #{{ $capacitacione->id }}</li>
                </ol>
            </div>
            
            <div class="card-body">
                <form action="{{ route('capacitaciones.update', compact('capacitacione')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <!-- Aquí puedes agregar los campos del formulario para editar la capacitación -->
                        <!-- Por ejemplo: -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label" style="color: white;">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $capacitacione->nombre }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $capacitacione->descripcion }}</textarea>
                        </div>
                        <!-- Otros campos... -->
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-end">
                            <a href="{{ route('capacitaciones.index', []) }}" class="btn btn-light btn-sm">@lang('Cancelar')</a>
                            <button type="submit" class="btn btn-success btn-sm">@lang('Actualizar capacitación')</button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
@endsection
