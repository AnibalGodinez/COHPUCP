@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title my-12 font-weight-bold">Agendas</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda personal:</h6>
                            <p class="text-muted">Donde cada miembro puede gestionar sus propias citas, recordatorios y eventos.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda institucional:</h6>
                            <p class="text-muted">Para eventos, reuniones y actividades organizadas por el colegio en su conjunto, como conferencias, talleres, asambleas, etc.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda de cursos y capacitaciones:</h6>
                            <p class="text-muted">Para listar los programas de formación continua, cursos, seminarios y otras actividades de educación continua ofrecidas por el colegio.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda de exámenes y fechas importantes:</h6>
                            <p class="text-muted">Para mantener a los miembros informados sobre las fechas límite, exámenes, plazos para la presentación de documentos importantes, como la renovación de la membresía, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda de eventos externos:</h6>
                            <p class="text-muted">Para promover eventos relevantes para los profesionales de la contaduría pública que son organizados por otras instituciones, como conferencias de la industria, simposios, etc.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda de reuniones de comités y grupos de trabajo:</h6>
                            <p class="text-muted">Para coordinar las reuniones de los diferentes comités y grupos de trabajo dentro del colegio, como el comité de ética, el comité de educación, etc.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda de networking:</h6>
                            <p class="text-muted">Para promover eventos y actividades destinadas a fomentar la interacción entre los miembros del colegio y otros profesionales del campo de la contaduría pública.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Agenda de eventos sociales y de camaradería:</h6>
                            <p class="text-muted">Para listar actividades recreativas y sociales destinadas a fortalecer los lazos entre los miembros del colegio, como cenas, fiestas, excursiones, etc.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
