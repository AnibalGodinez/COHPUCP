@extends('layouts.app')

@php
   $dashboardContents = App\Models\DashboardContent::all();
@endphp

@section('content')
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row">
            @foreach($dashboardContents as $dashboardContent)
                <div class="col-12 mb-4">

                    {{-- CONTENEDOR POR DEFECTO --}}
                    @if($dashboardContent->layout == 'Por defecto')
                        <div class="card border-0">
                            @if($dashboardContent->images)
                                <div class="card-img-top text-center">
                                    <img src="{{ asset('storage/' . $dashboardContent->images) }}" alt="{{ $dashboardContent->title }}" class="img-fluid" style="width: 40%; height: auto;">
                                </div>
                            @endif
                            <div class="card-body">
                                @if($dashboardContent->title)
                                    <h1 class="card-title text-center"><strong>{{ $dashboardContent->title }}</strong></h1>
                                @endif
                                @if($dashboardContent->subtitle)
                                    <h3 class="card-subtitle mb-2 text-muted text-center">{{ $dashboardContent->subtitle }}</h3>
                                @endif
                                @if($dashboardContent->description)
                                    <p class="card-text" style="font-size: 1.2rem;">{!! nl2br(e($dashboardContent->description)) !!}</p>
                                @endif
                                @if($dashboardContent->links || $dashboardContent->facebook_link || $dashboardContent->twitter_link || $dashboardContent->youtube_link || $dashboardContent->whatsapp_link || $dashboardContent->instagram_link)
                                    <div class="text-center mt-3">
                                        @if($dashboardContent->links)
                                            <a href="{{ $dashboardContent->links }}" class="btn btn-primary">Ver Más</a>
                                        @endif
                                        @if($dashboardContent->facebook_link)
                                            <a href="{{ $dashboardContent->facebook_link }}" target="_blank" class="btn btn-primary">Facebook</a>
                                        @endif
                                        @if($dashboardContent->twitter_link)
                                            <a href="{{ $dashboardContent->twitter_link }}" target="_blank" class="btn btn-primary">Twitter</a>
                                        @endif
                                        @if($dashboardContent->youtube_link)
                                            <a href="{{ $dashboardContent->youtube_link }}" target="_blank" class="btn btn-primary">YouTube</a>
                                        @endif
                                        @if($dashboardContent->whatsapp_link)
                                            <a href="{{ $dashboardContent->whatsapp_link }}" target="_blank" class="btn btn-primary">WhatsApp</a>
                                        @endif
                                        @if($dashboardContent->instagram_link)
                                            <a href="{{ $dashboardContent->instagram_link }}" target="_blank" class="btn btn-primary">Instagram</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                    {{-- CONTENEDOR IMAGEN --}}
                    @elseif($dashboardContent->layout == 'Imagen')
                        <div class="card border-0 position-relative p-0">
                            @if($dashboardContent->images)
                                <img src="{{ asset('storage/' . $dashboardContent->images) }}" alt="{{ $dashboardContent->title }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            @endif
                            @if($dashboardContent->pdf || $dashboardContent->videos)
                                <div class="position-absolute bottom-0 start-0 p-3">
                                    @if($dashboardContent->pdf)
                                        <a href="{{ asset('storage/' . $dashboardContent->pdf) }}" class="btn btn-primary mb-2" target="_blank">Ver PDF</a>
                                    @endif
                                    @if($dashboardContent->videos)
                                        <a href="{{ asset('storage/' . $dashboardContent->videos) }}" class="btn btn-primary" target="_blank">Ver Video</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif
                    
                </div>
            @endforeach
        </div>
    </div>     
@endsection
