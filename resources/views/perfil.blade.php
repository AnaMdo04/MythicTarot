@extends('auth.layouts')

@section('content')
<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center custom-card">
                <div class="left-section">
                    <div class="button-container">
                        <a href="{{ route('ajustes') }}" class="btn btn-secondary btn-block mb-3 custom-button">Ajustes de Configuración</a>
                        <a href="{{ route('lecturas') }}" class="btn btn-secondary btn-block mb-3 custom-button">Mis Lecturas</a>
                        <a href="{{ route('cartas') }}" class="btn btn-secondary btn-block custom-button">Mis Publicaciones</a>
                    </div>
                </div>
                <div class="right-section text-center">
                    <div class="profile-image-container mb-3">
                        @if (Auth::user()->profile_image)
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="rounded-circle profile-image" alt="Profile Image">
                        @else
                            <i class="fas fa-user-circle fa-10x default-profile-icon"></i>
                        @endif
                    </div>
                    <a href="{{ route('perfil.edit') }}" class="btn btn-primary mt-3">Cambiar Foto Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
