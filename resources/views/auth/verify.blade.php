@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--8 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body">
                        <h3 class="text-center">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
                        
                        <p class="text-dark mb-2"><strong> ¡GRACIAS POR REGISTRARTE! </strong><br><br> Antes de comenzar, 
                            <strong> ¿Podría verificar su dirección de correo electrónico haciendo click en el enlace 
                            que le acabamos de enviar a su correo electrónico? </strong><br> Si no recibistes el correo electrónico, haz click en el botón y le enviaremos otro.</p><br>
                        
                        <div class="d-flex justify-content-between">
                            @if (Route::has('verification.send'))
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-simple">Haga click aquí para solicitar otro</button>
                                </form>
                            @endif

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-simple">Cerrar sesión</a>
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
