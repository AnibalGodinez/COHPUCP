@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3>ASIGNAR PERMISOS : Rol {{ $role->name }}</h3>
                </div>

                <!-- Mensaje de éxito -->
                @if(session('status'))
                <div class="text-center">
                    <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                        {{ session('status') }}
                        <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                @endif

                <div class="card-body">

                    <form action="{{ url('roles/'.$role->id.'/agregar-permisos') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            @error('permission')
                                <span class="tex-danger">{{ $message }}</span>
                            @enderror

                            <div class="text-center">
                                <strong>LISTA DE PERMISOS</strong>
                            </div>
                            
                            <div style="margin-bottom: 20px;"></div> 
                            <div class="row">

                                @foreach ($permissions as $permission)
                                
                                <div class="col-md-2">
                                    <label class="form-check-label">
                                        <input
                                            type="checkbox" 
                                            name="permission[]" 
                                            value="{{ $permission->name }}" 
                                            class="form-control"
                                            id="permission_{{ $permission->id }}"
                                            style="width: 18px; height: 18px; margin:auto"
                                        @if($role->hasPermissionTo($permission->name)) checked @endif
                                            {{in_array($permission->id, $rolePermissions) ? 'checked':''}}
                                        />
                                        {{$permission->name}}
                                    </label>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    Asignar
                                </button>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                    Volver
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
