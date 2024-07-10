@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 0px">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="title">Actualizar contraseña</h2>
            </div>
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')
                
                    @include('alerts.success', ['key' => 'password_status'])
                
                    <div class="form-row justify-content-center">
                        <div class="form-group text-center col-md-4">
                            <label for="old_password"><strong>Contraseña actual *</strong></label>
                            <input 
                                type="password" 
                                name="old_password" 
                                class="form-control @error('old_password') is-invalid @enderror" 
                                placeholder="Contraseña actual" 
                                value="{{ old('old_password') }}"  
                                required>
                            @error('old_password')
                                <span class="invalid-feedback d-block text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                    </div>                       
                    
                    <div class="form-row justify-content-center">
                        <div class="form-group text-center col-md-4">
                            <label for="password"><strong>Nueva contraseña *</strong></label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                placeholder="Ingrese la nueva contraseña"
                                minlength="8"
                                maxlength="20"
                                value="{{ old('password') }}" 
                                required>
                            @error('password')
                                <span class="invalid-feedback d-block text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group text-center col-md-4">
                            <label for="password_confirmation"><strong>Confirmar Contraseña *</strong></label>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                class="form-control @error('password_confirmation') is-invalid @enderror" 
                                placeholder="Confirme la nueva contraseña"
                                minlength="8"
                                maxlength="20" 
                                value="{{ old('password_confirmation') }}" 
                                required>
                            @error('password_confirmation')
                                <span class="invalid-feedback d-block text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>                    

                <div class="card-footer">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success px-4">Cambiar contraseña</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
