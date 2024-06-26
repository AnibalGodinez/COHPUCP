@extends('layouts.app')

@section('content')
<div class="info-section text-center">
    <h1 class="text-center">COHPUCP</h1>
    <div class="imagen-container">
        <div class="imagen" style="background-image: url('{{ asset('white/img/logo-empresa.jpg') }}');"></div>
    </div>
</div>

<div class="info-section text-center" style="background-color: #f8f9fa;">
    <div class="header-body text-center mb-7">
        <div class="col-md-5 mx-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="description"><br>
                    <h3 class="info-title">Misión</h3>
                    <p class="description">
                        Impulsar y promover la superación de nuestros agremiados; velando por la protección de los derechos inherentes como profesionales de la Contaduría Pública; así como, garantizar que el ejercicio de la profesión se desarrolle de acuerdo a los estándares éticos reconocidos a nivel mundial. 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<div class="info-section" style="background-color: #e9ecef;">
    <div class="header-body text-center mb-7">
        <div class="col-md-5 mx-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="description"><br>
                    <h3 class="info-title">Visión</h3>
                    <p class="description">
                        Ser un colegio de alto nivel, que de manera permanente busque enaltecer, fortalecer y proteger el ejercicio de la profesión contable en Honduras. 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
