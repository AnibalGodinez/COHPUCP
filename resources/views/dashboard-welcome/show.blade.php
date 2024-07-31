<!-- resources/views/dashboard-welcome/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Contenido del Dashboard</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Título: {{ $dashboardContent->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Subtítulo: {{ $dashboardContent->subtitle }}</h6>
                <p class="card-text">Descripción: {{ $dashboardContent->description }}</p>
                <p class="card-text">Diseño: {{ $dashboardContent->layout }}</p>
                <p class="card-text">Gráficos de Barras: {{ $dashboardContent->bar_charts }}</p>
                <p class="card-text">Gráficos de Pastel: {{ $dashboardContent->pie_charts }}</p>
                <p class="card-text">Tablas de Datos: {{ $dashboardContent->data_tables }}</p>
                <p class="card-text">Listas de Tareas: {{ $dashboardContent->task_lists }}</p>
                <p class="card-text">Archivos PDF: {{ $dashboardContent->pdf_files }}</p>
                <p class="card-text">Documentos: {{ $dashboardContent->documents }}</p>
                <p class="card-text">Enlaces Internos: {{ $dashboardContent->internal_links }}</p>
                <p class="card-text">Enlaces Externos: {{ $dashboardContent->external_links }}</p>
                <p class="card-text">Imágenes: {{ $dashboardContent->images }}</p>
                <p class="card-text">Videos: {{ $dashboardContent->videos }}</p>
                <p class="card-text">Calendarios: {{ $dashboardContent->calendars }}</p>
                <p class="card-text">Mapas: {{ $dashboardContent->maps }}</p>
                <p class="card-text">Enlace de Facebook: {{ $dashboardContent->facebook_link }}</p>
                <p class="card-text">Enlace de Twitter: {{ $dashboardContent->twitter_link }}</p>
                <p class="card-text">Enlace de YouTube: {{ $dashboardContent->youtube_link }}</p>
                <p class="card-text">Enlace de WhatsApp: {{ $dashboardContent->whatsapp_link }}</p>
                <p class="card-text">Enlace de Instagram: {{ $dashboardContent->instagram_link }}</p>
                <p class="card-text">ID de Usuario: {{ $dashboardContent->user_id }}</p>

                <a href="{{ route('dashboard-contents.edit', $dashboardContent->id) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('dashboard-contents.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
