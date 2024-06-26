@extends('auth.layouts')

@section('content')
<link href="{{ asset('css/ajustes.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajustes de Configuración</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre de Usuario</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="profile_image">Foto de Perfil</label>
                            <div class="custom-file-input-container">
                                <input type="file" class="form-control-file @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image" onchange="document.getElementById('file-name').textContent = this.files[0].name">
                                <label for="profile_image" class="custom-file-label">Seleccionar archivo</label>
                                <span id="file-name" class="file-name">Ningún archivo seleccionado</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                    </form>

                    @if (Auth::user()->profile_image)
                        <div class="delete-button-container mt-3">
                            <form id="delete-profile-image-form" method="POST" action="{{ route('perfil.deleteProfileImage') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar Foto de Perfil</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
