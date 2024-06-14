@extends('layouts.app', ['page' => __('Usuarios'), 'pageSlug' => 'usuarios'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Editar usuario</h3>
                        <a href="{{url('usuarios')}}" class="btn btn-dark btn-sm">Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{url('usuarios/'.$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="">Nombre</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control w-50">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Correo electrónico</label>
                            <input type="text" name="email" value="{{$user->email}}"  class="form-control w-50">
                        </div>

                        <div class="mb-3">
                            <label for="">Contraseña</label>
                            <input type="text" name="password" class="form-control w-50">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="">Seleccionar rol</option>
                                @foreach ($roles as $role)
                                    <option 
                                        value="{{$role}}"
                                        {{in_array($role, $userRoles) ? 'selected':''}}
                                        >
                                        {{$role}}
                                    </option>  
                                @endforeach
                            </select>
                            @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info btn-sm">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
