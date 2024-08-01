<!-- resources/views/dashboard-welcome/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contenido del Dashboard</h1>
        <a href="{{ route('dashboard-content.create') }}" class="btn btn-primary">Crear Nuevo Contenido</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dashboardContents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->title }}</td>
                        <td>{{ $content->subtitle }}</td>
                        <td>{{ $content->description }}</td>
                        <td>
                            <a href="{{ route('dashboard-contents.show', $content->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('dashboard-contents.edit', $content->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('dashboard-contents.destroy', $content->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
