<!-- resources/views/dashboard-welcome/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Contenido del Dashboard</h1>

        <form action="{{ route('dashboard-contents.update', $dashboardContent->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="layout">Diseño:</label>
                <input type="text" name="layout" id="layout" class="form-control" value="{{ old('layout', $dashboardContent->layout) }}">
            </div>

            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $dashboardContent->title) }}">
            </div>

            <div class="form-group">
                <label for="subtitle">Subtítulo:</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $dashboardContent->subtitle) }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $dashboardContent->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="bar_charts">Gráficos de Barras (JSON):</label>
                <textarea name="bar_charts" id="bar_charts" class="form-control">{{ old('bar_charts', $dashboardContent->bar_charts) }}</textarea>
            </div>

            <div class="form-group">
                <label for="pie_charts">Gráficos de Pastel (JSON):</label>
                <textarea name="pie_charts" id="pie_charts" class="form-control">{{ old('pie_charts', $dashboardContent->pie_charts) }}</textarea>
            </div>

            <div class="form-group">
                <label for="data_tables">Tablas de Datos (JSON):</label>
                <textarea name="data_tables" id="data_tables" class="form-control">{{ old('data_tables', $dashboardContent->data_tables) }}</textarea>
            </div>

            <div class="form-group">
                <label for="task_lists">Listas de Tareas (JSON):</label>
                <textarea name="task_lists" id="task_lists" class="form-control">{{ old('task_lists', $dashboardContent->task_lists) }}</textarea>
            </div>

            <div class="form-group">
                <label for="pdf_files">Archivos PDF (JSON):</label>
                <textarea name="pdf_files" id="pdf_files" class="form-control">{{ old('pdf_files', $dashboardContent->pdf_files) }}</textarea>
            </div>

            <div class="form-group">
                <label for="documents">Documentos (JSON):</label>
                <textarea name="documents" id="documents" class="form-control">{{ old('documents', $dashboardContent->documents) }}</textarea>
            </div>

            <div class="form-group">
                <label for="internal_links">Enlaces Internos (JSON):</label>
                <textarea name="internal_links" id="internal_links" class="form-control">{{ old('internal_links', $dashboardContent->internal_links) }}</textarea>
            </div>

            <div class="form-group">
                <label for="external_links">Enlaces Externos (JSON):</label>
                <textarea name="external_links" id="external_links" class="form-control">{{ old('external_links', $dashboardContent->external_links) }}</textarea>
            </div>

            <div class="form-group">
                <label for="images">Imágenes (JSON):</label>
                <textarea name="images" id="images" class="form-control">{{ old('images', $dashboardContent->images) }}</textarea>
            </div>

            <div class="form-group">
                <label for="videos">Videos (JSON):</label>
                <textarea name="videos" id="videos" class="form-control">{{ old('videos', $dashboardContent->videos) }}</textarea>
            </div>

            <div class="form-group">
                <label for="calendars">Calendarios (JSON):</label>
                <textarea name="calendars" id="calendars" class="form-control">{{ old('calendars', $dashboardContent->calendars) }}</textarea>
            </div>

            <div class="form-group">
                <label for="maps">Mapas (JSON):</label>
                <textarea name="maps" id="maps" class="form-control">{{ old('maps', $dashboardContent->maps) }}</textarea>
            </div>

            <div class="form-group">
                <label for="facebook_link">Enlace de Facebook:</label>
                <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link', $dashboardContent->facebook_link) }}">
            </div>

            <div class="form-group">
                <label for="twitter_link">Enlace de Twitter:</label>
                <input type="text" name="twitter_link" id="twitter_link" class="form-control" value="{{ old('twitter_link', $dashboardContent->twitter_link) }}">
            </div>

            <div class="form-group">
                <label for="youtube_link">Enlace de YouTube:</label>
                <input type="text" name="youtube_link" id="youtube_link" class="form-control" value="{{ old('youtube_link', $dashboardContent->youtube_link) }}">
            </div>

            <div class="form-group">
                <label for="whatsapp_link">Enlace de WhatsApp:</label>
                <input type="text" name="whatsapp_link" id="whatsapp_link" class="form-control" value="{{ old('whatsapp_link', $dashboardContent->whatsapp_link) }}">
            </div>

            <div class="form-group">
                <label for="instagram_link">Enlace de Instagram:</label>
                <input type="text" name="instagram_link" id="instagram_link" class="form-control" value="{{ old('instagram_link', $dashboardContent->instagram_link) }}">
            </div>

            <div class="form-group">
                <label for="user_id">ID de Usuario:</label>
                <input type="number" name="user_id" id="user_id" class="form-control" value="{{ old('user_id', $dashboardContent->user_id) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
