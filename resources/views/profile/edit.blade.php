@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px; padding: 6px;">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card mb-3" style="border: 3px solid #ebeff3; width: 100%;">
                    <div class="card shadow-lg">
                            <h1 class="card-header bg-info text-white text-center">
                                Editar perfil</h1><br>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="profile_image">Foto de Perfil</label>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                                @if (Auth::user()->profile_image)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="img-fluid mt-2" style="width: 150px; height: auto;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="facebook_link">Enlace de Facebook</label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="facebook_link" 
                                name="facebook_link" 
                                value="{{ old('facebook_link', Auth::user()->facebook_link) }}">
                            </div>

                            <div class="form-group">
                                <label for="twitter_link">Enlace de Twitter</label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="twitter_link" 
                                name="twitter_link" 
                                value="{{ old('twitter_link', Auth::user()->twitter_link) }}">
                            </div>

                            <div class="form-group">
                                <label for="bio">Descripción</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ old('bio', Auth::user()->bio) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
