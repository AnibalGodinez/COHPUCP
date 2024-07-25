@extends('layouts.app')

@php
   $contents = App\Models\WelcomeContent::all();
@endphp

@section('content')
    <div class="container-fluid" style="margin-top:-140px">
        <div class="row">
            @foreach($contents as $content)
                <div class="col-12 mb-2">
                    @if($content->layout == 'default')
                        <div class="card h-120">
                            @if($content->image_path)
                                <div class="card-img-top">
                                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="width: 100%; height: auto;">
                                </div>
                            @endif
                            <div class="card-body">
                                <h2 class="card-title text-center"><strong>{{ $content->title }}</strong></h2>
                                <p class="card-text">{!! nl2br(e($content->description)) !!}</p>
                            </div>
                        </div>
                    @elseif($content->layout == 'image-right')
                        <div class="card h-120">
                            <div class="row no-gutters">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h2 class="card-title text-center"><strong>{{ $content->title }}</strong></h2>
                                        <p class="card-text">{!! nl2br(e($content->description)) !!}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    @if($content->image_path)
                                        <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>     
@endsection
