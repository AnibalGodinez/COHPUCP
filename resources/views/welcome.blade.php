@extends('layouts.app')

@section('content')

<div class="info-section text-center" style="margin: -400px; background-image: url('{{ asset('white/img/escritorio.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
    <div class="header-body text-center mb-7">
        <div class="col-md-5 mx-auto"><br><br><br><br>      
            <div class="info-area info-horizontal mt-80" style="margin-top: 250px">
                <img src="{{ asset('white/img/favicon.png') }}" alt="Descripción de la imagen" style="max-width: 100%; height: auto; margin-bottom: 20px;">
            </div>
        </div>
    </div>
</div>

@endsection
