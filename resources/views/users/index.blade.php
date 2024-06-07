@extends('layouts.app', ['page' => __('Usuarios'), 'pageSlug' => 'users'])

@section('content')

@include('role-permission.nav-links')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="title">Usuarios</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono casa</th>
                                    <th>Teléfono celular</th>
                                    <th>Correo electrónico</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Fecha de creación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->apellido }}</td>
                                        <td>{{ $usuario->telefono_casa }}</td>
                                        <td>{{ $usuario->telefono_cel }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->rol }}</td>
                                        <td>{{ $usuario->estado }}</td>
                                        <td>{{ optional($usuario->created_at)->format('d/m/Y h:i:s a') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
