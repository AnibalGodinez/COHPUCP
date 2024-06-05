@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title my-4 font-weight-bold">Gestiones</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de membresía:</h6>
                            <p class="text-muted">Para administrar el registro de nuevos miembros, renovaciones de membresía, pagos de cuotas, y cualquier otro aspecto relacionado con la afiliación al colegio.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de eventos:</h6>
                            <p class="text-muted">Para planificar, organizar y gestionar eventos institucionales como conferencias, seminarios, talleres, asambleas generales, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de documentación:</h6>
                            <p class="text-muted">Para centralizar y administrar documentos importantes del colegio, como estatutos, reglamentos, actas de reuniones, políticas internas, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de comités y grupos de trabajo:</h6>
                            <p class="text-muted">Para coordinar las actividades de los diferentes comités y grupos de trabajo dentro del colegio, como el comité de ética, el comité de educación, comités de investigación, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de proyectos:</h6>
                            <p class="text-muted">Para llevar un seguimiento de los proyectos y actividades específicas que el colegio esté llevando a cabo, como campañas de concientización, iniciativas de responsabilidad social, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de comunicaciones:</h6>
                            <p class="text-muted">Para administrar la comunicación interna y externa del colegio, incluyendo correos electrónicos, boletines informativos, mensajes en redes sociales, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión de recursos humanos:</h6>
                            <p class="text-muted">Para manejar aspectos relacionados con el personal del colegio, como contrataciones, evaluaciones de desempeño, capacitaciones, entre otros.</p>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">Gestión financiera:</h6>
                            <p class="text-muted">Para llevar un registro y control de los ingresos y gastos del colegio, así como la gestión de presupuestos, reportes financieros, entre otros.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
