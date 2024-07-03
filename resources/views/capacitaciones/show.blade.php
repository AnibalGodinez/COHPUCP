@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','capacitaciones']) }}" style="color: rgb(255, 255, 255); font-size: 18px;">Capacitaciones</a></li>
                    <li class="breadcrumb-item">@lang('Capacitación') #{{ $capacitacione->id }}</li>
                </ol>
                <a href="{{ route('capacitaciones.index', []) }}" class="btn btn-light" style="font-size: 12px;"><i class="fa fa-caret-left"></i> @lang('Volver')</a>
            </div>
            

            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">ID:</th>
                            <td>{{ $capacitacione->id }}</td>
                        </tr>
                        <!-- Agrega más detalles de la capacitación aquí -->
                        <!-- Por ejemplo: -->
                        <tr>
                            <th scope="row">Nombre:</th>
                            <td>{{ $capacitacione->nombre }}</td>
                        </tr>
                        <!-- Otros detalles... -->
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('capacitaciones.edit', compact('capacitacione')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Editar')</a>
                <form action="{{ route('capacitaciones.destroy', compact('capacitacione')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Eliminar')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
