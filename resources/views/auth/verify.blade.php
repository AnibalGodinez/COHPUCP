@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 140px">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h3 class="text-center text-dark">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
                        
                        <p class="text-dark mb-4"><strong><strong>¡GRACIAS POR REGISTRARTE!</strong></strong><br><br> Antes de comenzar, 
                            <strong>¿Podría verificar su dirección de correo electrónico haciendo click en el enlace 
                            que le acabamos de enviar a su correo electrónico?</strong><br> Si no recibiste el correo electrónico, haz click en el botón y te enviaremos otro.</p>
                        
                        <div class="d-flex justify-content-between mt-4">
                            @if (Route::has('verification.send'))
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Solicitar otro link</button>
                                </form>
                            @endif

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

