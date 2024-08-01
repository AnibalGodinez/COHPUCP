@extends('layouts.app')

@php
   $contents = App\Models\DashboardContent::all();
@endphp

@section('content')
    <div class="container-fluid" style="margin-top: -130px;">
        <div class="row">
            @foreach($contents as $content)
                <div class="col-12">

                    {{-- CONTENEDOR POR DEFECTO --}}
                    @if($content->layout == 'Por defecto')
                        <div class="card border-0">
                            @if($content->images)
                                <div class="card-img-top text-center">
                                    <img src="{{ asset('storage/' . $content->images) }}" alt="{{ $content->title }}" class="img-fluid" style="width: 40%; height: auto;">
                                </div>
                            @endif
                            <div class="card-body">
                                <h1 class="card-title text-center"><strong>{{ $content->title }}</strong></h1>
                                <p class="card-text" style="font-size: 1.2rem;">{!! nl2br(e($content->description)) !!}</p>
                            </div>
                        </div>

                    {{-- CONTENEDOR IMAGEN --}}
                    @elseif($content->layout == 'Imagen')
                        <div class="card border-0 position-relative p-0">
                            @if($content->images)
                                <img src="{{ asset('storage/' . $content->images) }}" alt="{{ $content->title }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            @endif
                        </div>
                    @endif {{-- Aquí se cierra el @if correspondiente --}}
                    
                </div>
            @endforeach
        </div>
    </div>     
@endsection
