@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">
                <div class="card-body">
                    <h3 class="text-center">LISTA DE USUARIOS SIN NÚMERO DE COLEGIACIÓN</h3>


                    <a href="{{ route('numero_colegiacion.create') }}" class="btn btn-primary">Añadir Número de Colegiación</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Número de Colegiación</th>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($numeros as $numero)
                                <tr>
                                    <td>{{ $numero->numero_colegiacion }}</td>
                                    <td>{{ $numero->user->name }}</td>
                                    <td>
                                        <a href="{{ route('numero_colegiacion.edit', $numero) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('numero_colegiacion.destroy', $numero) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
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
