@extends('layouts.app')

@php
   $contents = App\Models\WelcomeContent::all();
@endphp

@section('content')
    <div class="container-fluid" style="margin-top: -140px;">
        <div class="row">
            @foreach($contents as $content)
                <div class="col-12">

                    {{-- CONTENEDOR POR DEFECTO --}}
                    @if($content->layout == 'Por defecto')
                        <div class="card border-0">
                            @if($content->image_path)
                                <div class="card-img-top text-center">
                                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="width: 40%; height: auto;">
                                </div>
                            @endif
                            <div class="card-body">
                                <h1 class="card-title text-center"><strong>{{ $content->title }}</strong></h1>
                                <p class="card-text" style="font-size: 1.50rem;">{!! nl2br(e($content->description)) !!}</p>
                            </div>
                        </div>

                    {{-- CONTENEDOR IMAGEN A LA DERECHA --}}
                    @elseif($content->layout == 'Imagen a la derecha')
                        <div class="card h-120">
                            <div class="row no-gutters">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h1 class="card-title text-center"><strong>{{ $content->title }}</strong></h1>
                                        <p class="card-text" style="font-size: 1.50rem;">{!! nl2br(e($content->description)) !!}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    @if($content->image_path)
                                        <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                    @endif
                                </div>
                            </div>
                        </div>

                    {{-- CONTENEDOR IMAGEN A LA IZQUIERDA --}}
                    @elseif($content->layout == 'Imagen a la izquierda')
                        <div class="card h-120">
                            <div class="row no-gutters">
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    @if($content->image_path)
                                        <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h1 class="card-title text-center"><strong>{{ $content->title }}</strong></h1>
                                        <p class="card-text" style="font-size: 1.50rem;">{!! nl2br(e($content->description)) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- CONTENEDOR IMAGEN --}}
                    @elseif($content->layout == 'Imagen')
                        <div class="card border-0 position-relative p-0">
                            @if($content->image_path)
                                <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            @endif
                        </div>

                    {{-- CONTENEDOR IMAGEN DE FONDO OSCURO --}}
                    @elseif($content->layout == 'Imagen de fondo oscuro')
                        <div class="card border-0 position-relative">
                            @if($content->image_path)
                                <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.315);">
                                <h1 class="card-title text-center text-white">{{ $content->title }}</h1>
                                <p class="card-text text-center text-white" style="font-size: 1.50rem;">{!! nl2br(e($content->description)) !!}</p>
                            </div>
                        </div>

                    {{-- CONTENEDOR IMAGEN DE FONDO CLARO --}}
                    @elseif($content->layout == 'Imagen de fondo claro')
                        <div class="card border-0 position-relative">
                            @if($content->image_path)
                                <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.144);">
                                <h1 class="card-title text-center">{{ $content->title }}</h1>
                                <p class="card-text text-center" style="font-size: 1.50rem;">{!! nl2br(e($content->description)) !!}</p>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>     
@endsection
