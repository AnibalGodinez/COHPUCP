@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold">Crear usuario</h2>
                    <form action="{{url('usuarios')}}" method="POST">
                        @csrf
                        
                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="">Primer nombre</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="name2">Segundo Nombre</label>
                                <input type="text" name="name2" class="form-control" id="name2">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="apellido">Primer apellido</label>
                                <input type="text" name="apellido" class="form-control" id="apellido">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="apellido2">Segundo apellido</label>
                                <input type="text" name="apellido2" class="form-control" id="apellido2">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero_identidad">Número de identidad</label>
                                <input type="text" name="numero_identidad" class="form-control" id="numero_identidad">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion">Número de colegiación</label>
                                <input type="text" name="numero_colegiacion" class="form-control" id="numero_colegiacion">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="rtn">RTN</label>
                                <input type="text" name="rtn" class="form-control" id="rtn">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="sexo">Sexo</label>
                                <select name="sexo" class="form-control" id="sexo">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" id="telefono">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="telefono_celular">Teléfono Celular</label>
                                <input type="text" name="telefono_celular" class="form-control" id="telefono_celular">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Correo electrónico</label>
                                <input type="text" name="email" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Contraseña</label>
                                <input type="text" name="password" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control" id="estado">
                                    <option value="">Seleccionar estado</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="">Rol</label>
                                <select name="roles[]" class="form-control">
                                    <option value="">Seleccionar rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{url('usuarios')}}" class="btn btn-danger px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
