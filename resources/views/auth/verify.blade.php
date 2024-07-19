@extends('layouts.app')

@section('content')
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Verifique su dirección de correo electrónico</small>
                        </div>
                        <div>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                                </div>
                            @endif

                            Antes de continuar, consulte su correo electrónico para obtener un enlace de verificación.

                            @if (Route::has('verification.send'))
                                Si no recibiste el correo electrónico
                                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Haga click aquí para solicitar otro</button>.
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
