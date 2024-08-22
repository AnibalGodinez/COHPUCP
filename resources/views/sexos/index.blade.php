@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-header">
                        <h3>Lista de Sexos</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('sexos.create') }}" class="btn btn-primary mb-3">Agregar Sexo</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sexos as $sexo)
                                    <tr>
                                        <td>{{ $sexo->id }}</td>
                                        <td>{{ $sexo->nombre }}</td>
                                        <td>
                                            <a href="{{ route('sexos.edit', $sexo->id) }}" class="btn btn-warning">Editar</a>
                                            <form action="{{ route('sexos.destroy', $sexo->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
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
