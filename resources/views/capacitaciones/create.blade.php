@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/capacitaciones') }}" style="color: black; font-size: 18px;">Capacitaciones</a></li>
                    <li class="breadcrumb-item">@lang('Crear nueva')</li>
                </ol>
            </div>            

            <div class="card-body">
                <form action="{{ route('capacitaciones.store') }}" method="POST">
                    @csrf
                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <!-- Campo Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('capacitaciones.index') }}" class="btn btn-light me-2">@lang('Cancelar')</a>
                        <button type="submit" class="btn btn-primary">@lang('Crear nueva Capacitación')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
