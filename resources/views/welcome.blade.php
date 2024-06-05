@extends('layouts.app', ['class' => 'home-page', 'page' => __('Inicio'), 'contentClass' => 'home-page'])

@section('content')

        <div class="header py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10">
                            <h1 class="text-black">{{ __('Plataforma tecnológica COHPUCP') }}</h1>
                            <p class="text-lead text-grey">
                                El Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP) es una entidad profesional establecida por el decreto legislativo 19-93 el 16 de marzo de 1993, que agrupa y representa a los profesionales con estudios universitarios en Contaduría Pública y disciplinas equivalentes. Su principal objetivo es la representación y defensa de los intereses de sus miembros, promoviendo condiciones laborales justas y protegiendo sus derechos. Además, regula y supervisa el ejercicio de la profesión mediante el establecimiento de normas y estándares profesionales, asegurando la calidad e integridad de los servicios contables. <br><br>
                                COHPUCP se dedica también a la continua educación y desarrollo profesional de sus miembros, organizando cursos, talleres y seminarios para mantenerlos actualizados. Promueve un estricto código de ética profesional que garantiza la confianza del público en la profesión. Ser miembro del COHPUCP proporciona credibilidad y reconocimiento, acceso a recursos y herramientas profesionales, y apoyo legal y técnico. Esta institución es crucial para la economía y sociedad hondureña, ya que asegura una práctica contable de alta calidad y ética, contribuyendo a la transparencia y eficiencia en la gestión financiera tanto en el sector público como en el privado, esencial para el desarrollo económico sostenible del país.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
