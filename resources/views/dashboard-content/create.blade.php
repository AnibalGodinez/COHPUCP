<!-- resources/views/dashboard-welcome/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Contenido del Dashboard</h1>

        <form action="{{ route('dashboard-content.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="layout">Diseño:</label>
                <input type="text" name="layout" id="layout" class="form-control" value="{{ old('layout') }}">
            </div>

            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="subtitle">Subtítulo:</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="bar_charts">Gráficos de Barras (JSON):</label>
                <textarea name="bar_charts" id="bar_charts" class="form-control">{{ old('bar_charts') }}</textarea>
            </div>

            <div class="form-group">
                <label for="pie_charts">Gráficos de Pastel (JSON):</label>
                <textarea name="pie_charts" id="pie_charts" class="form-control">{{ old('pie_charts') }}</textarea>
            </div>

            <div class="form-group">
                <label for="data_tables">Tablas de Datos (JSON):</label>
                <textarea name="data_tables" id="data_tables" class="form-control">{{ old('data_tables') }}</textarea>
            </div>

            <div class="form-group">
                <label for="task_lists">Listas de Tareas (JSON):</label>
                <textarea name="task_lists" id="task_lists" class="form-control">{{ old('task_lists') }}</textarea>
            </div>

            <div class="form-group">
                <label for="pdf_files">Archivos PDF (JSON):</label>
                <textarea name="pdf_files" id="pdf_files" class="form-control">{{ old('pdf_files') }}</textarea>
            </div>

            <div class="form-group">
                <label for="documents">Documentos (JSON):</label>
                <textarea name="documents" id="documents" class="form-control">{{ old('documents') }}</textarea>
            </div>

            <div class="form-group">
                <label for="internal_links">Enlaces Internos (JSON):</label>
                <textarea name="internal_links" id="internal_links" class="form-control">{{ old('internal_links') }}</textarea>
            </div>

            <div class="form-group">
                <label for="external_links">Enlaces Externos (JSON):</label>
                <textarea name="external_links" id="external_links" class="form-control">{{ old('external_links') }}</textarea>
            </div>

            <div class="form-group">
                <label for="images">Imágenes (JSON):</label>
                <textarea name="images" id="images" class="form-control">{{ old('images') }}</textarea>
            </div>

            <div class="form-group">
                <label for="videos">Videos (JSON):</label>
                <textarea name="videos" id="videos" class="form-control">{{ old('videos') }}</textarea>
            </div>

            <div class="form-group">
                <label for="calendars">Calendarios (JSON):</label>
                <textarea name="calendars" id="calendars" class="form-control">{{ old('calendars') }}</textarea>
            </div>

            <div class="form-group">
                <label for="maps">Mapas (JSON):</label>
                <textarea name="maps" id="maps" class="form-control">{{ old('maps') }}</textarea>
            </div>

            <div class="form-group">
                <label for="facebook_link">Enlace de Facebook:</label>
                <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link') }}">
            </div>

            <div class="form-group">
                <label for="twitter_link">Enlace de Twitter:</label>
                <input type="text" name="twitter_link" id="twitter_link" class="form-control" value="{{ old('twitter_link') }}">
            </div>

            <div class="form-group">
                <label for="youtube_link">Enlace de YouTube:</label>
                <input type="text" name="youtube_link" id="youtube_link" class="form-control" value="{{ old('youtube_link') }}">
            </div>

            <div class="form-group">
                <label for="whatsapp_link">Enlace de WhatsApp:</label>
                <input type="text" name="whatsapp_link" id="whatsapp_link" class="form-control" value="{{ old('whatsapp_link') }}">
            </div>

            <div class="form-group">
                <label for="instagram_link">Enlace de Instagram:</label>
                <input type="text" name="instagram_link" id="instagram_link" class="form-control" value="{{ old('instagram_link') }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
