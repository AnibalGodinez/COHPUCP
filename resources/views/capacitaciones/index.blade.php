@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-tasks">
            <div class="card-header ">
                <h6 class="title d-inline">@lang('Capacitaciones')</h6>
                <p class="card-category d-inline">@lang('Hoy')</p>
                <div class="dropdown">
                    <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                        <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('capacitaciones.create') }}">@lang('Crear nueva Capacitación')</a>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-full-width table-responsive">
                    <form action="{{ route('capacitaciones.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="@lang('Buscar Capacitaciones...')" value="{{ request()->search }}">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-search"></i> @lang('Buscar')</button>
                            </span>
                        </div>
                    </form>
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
                                            <a class="dropdown-item" href="{{ route('capacitaciones.edit', $capacitacione->id) }}">@lang('Editar')</a>
                                            <form action="{{ route('capacitaciones.destroy', $capacitacione->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">@lang('Eliminar')</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center">@lang('No hay capacitaciones disponibles')</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $capacitaciones->links('vendor.pagination.simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });
    </script>
@endpush
