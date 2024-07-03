@extends('layouts.app')

@section('content')

<div class="info-section text-center" style="margin: -400px; background-image: url('{{ asset('white/img/fondo4.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
    <div class="header-body text-center mb-7">
        <div class="col-md-5 mx-auto"><br><br><br><br>      
            <div class="info-area info-horizontal mt-80" style="margin-top: 250px">
                <!-- Imagen antes de la Misión -->
                <img src="{{ asset('white/img/favicon.png') }}" alt="Descripción de la imagen" style="max-width: 100%; height: auto; margin-bottom: 20px;">
                <div class="description"><br><br>
                    <h3 class="info-title">Misión</h3>
                    <p class="description">
                        Impulsar y promover la superación de nuestros agremiados; velando por la protección de los derechos inherentes como profesionales de la Contaduría Pública; así como, garantizar que el ejercicio de la profesión se desarrolle de acuerdo a los estándares éticos reconocidos a nivel mundial. 
                    </p>
                </div>
                <div class="description"><br>
                    <h3 class="info-title">Visión</h3>
                    <p class="description">
                        Ser un colegio de alto nivel, que de manera permanente busque enaltecer, fortalecer y proteger el ejercicio de la profesión contable en Honduras. 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
