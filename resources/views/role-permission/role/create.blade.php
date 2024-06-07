@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Crear rol</h3>
                        <a href="{{url('roles')}}" class="btn btn-dark btn-sm">Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('roles')}}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="rolesName">Nombre del rol</label>
                            <input type="text" id="rolesName" name="name" class="form-control w-50">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
