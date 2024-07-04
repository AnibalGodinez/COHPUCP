@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: -120px;">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <!-- Contenido opcional dentro del header -->
                    </div>
                </div>
                <div class="card-body" style="background-image: url('{{ asset('white/img/imagen-corporativa.png') }}'); background-size: cover; background-position: center;">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="col-sm-6 text-left">
                        <h2 class="card-title">Actuación</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
