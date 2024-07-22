@extends('layouts.app')

@php
   $contents = App\Models\WelcomeContent::all();
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        @foreach($contents as $content)
                            <div class="col-lg-12">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h3 class="card-title text-center">{{ $content->title }}</h3>
                                    </div>
                                    <div class="card-body">
                                        @if($content->image_path)
                                            <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                                        @endif
                                        <p>{{ $content->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>     
@endsection



