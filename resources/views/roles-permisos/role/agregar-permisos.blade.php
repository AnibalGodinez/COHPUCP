@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Rol : {{ $role->name }}</h3>
                        <a href="{{ url('roles') }}" class="btn btn-secondary btn-sm">Regresar</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ url('roles/'.$role->id.'/agregar-permisos') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            @error('permission')
                                <span class="tex-danger">{{ $message }}</span>
                            @enderror

                            <strong>Lista de permisos</strong>

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

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-sm">Asignar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
