@extends('layouts.app', ['pageSlug' => 'capacitacionesPlataforma'])

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-tasks">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="title">Capacitaciones</h3>
                <div>
                    <a href="{{ route('capacitaciones.create') }}" class="btn btn-info">
                        <i class="fas fa-plus"></i> Agregar nueva Capacitación
                    </a>
                </div>
            </div>

            {{-- Formulario de búsqueda --}}
            <form action="{{ route('capacitaciones.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar capacitaciones" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-simple" >
                            <i class="tim-icons icon-zoom-split "></i> Buscar
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-full-width table-responsive">
                <table class="table">
                    <tbody>
                        @forelse($capacitaciones as $capacitacione)
                        <tr>
                            <td>
                                <p class="title">{{ $capacitacione->nombre }}</p>
                                <p class="text-muted">{{ $capacitacione->descripcion }}</p>
                            </td>
                            <td class="td-actions text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="tim-icons icon-settings-gear-63"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('capacitaciones.edit', $capacitacione->id) }}">
                                            <i class="tim-icons icon-pencil"></i> @lang('Editar')
                                        </a>
                                        <form action="{{ route('capacitaciones.destroy', $capacitacione->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <i class="tim-icons icon-trash-simple"></i> @lang('Eliminar')
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">@lang('No hay capacitaciones')</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $capacitaciones->links('paginacion.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
