@extends('layouts.app', ['page' => __('Permisos del Usuario'), 'pageSlug' => 'permisos'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="title">{{ __('Lista de Permisos') }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>
                                    {{ __('ID') }}
                                </th>
                                <th>
                                    {{ __('Nombre') }}
                                </th>
                                <th>
                                    {{ __('Descripción') }}
                                </th>
                            </thead>
                            <tbody>
                                @foreach($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->id }}</td>
                                        <td>{{ $permiso->nombre }}</td>
                                        <td>{{ $permiso->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
