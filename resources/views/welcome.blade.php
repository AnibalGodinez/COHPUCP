@extends('layouts.app')

@php
   $contents = App\Models\WelcomeContent::all();
@endphp

@section('content')
    <div class="container-fluid" style="margin-top:-120px">
        <div class="row">
            @foreach($contents as $content)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header text-center">
                            <h3 class="card-title">{{ $content->title }}</h3>
                        </div>
                        <div class="card-body">
                            @if($content->image_path)
                                <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                            @endif
                            <p class="card-text">{!! nl2br(e($content->description)) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>     
@endsection
