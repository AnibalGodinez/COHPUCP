@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title my-4 font-weight-bold">Consultas</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Consulta de normativas y regulaciones</h5>
                                    <p class="card-text">Donde los miembros del colegio pueden acceder a información actualizada sobre leyes, reglamentos, normativas y estándares relacionados con la contaduría pública en Honduras y a nivel internacional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Consulta de jurisprudencia</h5>
                                    <p class="card-text">Para acceder a casos legales relevantes, sentencias judiciales y decisiones administrativas relacionadas con la práctica contable y la ética profesional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Consulta de recursos educativos</h5>
                                    <p class="card-text">Donde se proporciona acceso a materiales de estudio, libros, artículos, videos y otros recursos educativos útiles para los profesionales de la contaduría pública.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
