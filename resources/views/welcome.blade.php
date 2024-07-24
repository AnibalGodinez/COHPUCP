@extends('layouts.app')

@php
   $contents = App\Models\WelcomeContent::all();
@endphp

@section('content')
    <div class="container-fluid" style="margin-top:-120px">
        <div class="row">
            @foreach($contents as $content)
                <div class="col-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">{{ $content->title }}</h3>
                            <p class="card-text">{!! nl2br(e($content->description)) !!}</p>
                        </div>
                        @if($content->image_path)
                            <div class="card-img-top">
                                <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="width: 100%; height: auto;">
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>     
@endsection
