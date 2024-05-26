@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card mb-3">
                <div class="card-header">Perfil</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('images/default-profile.png') }}" class="rounded-circle mb-3" alt="Profile Image" width="150">
                    <h2>{{ Auth::user()->name }}</h2>
                    <a href="{{ route('perfil.edit') }}" class="btn btn-primary mt-3">Cambiar Foto Perfil</a>
                    <div class="mt-4">
                        <a href="{{ route('ajustes') }}" class="btn btn-secondary btn-block mb-2">Ajustes de Configuración</a>
                        <a href="{{ route('lecturas') }}" class="btn btn-secondary btn-block mb-2">Mis Lecturas</a>
                        <a href="{{ route('cartas') }}" class="btn btn-secondary btn-block">Mis Cartas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-header,
    .btn-primary,
    .btn-secondary {
        background-color: #ddbea9;
        border-color: #ddbea9;
    }
    .btn-primary:hover,
    .btn-secondary:hover {
        background-color: #ac7b75;
        border-color: #ac7b75;
    }
</style>
@endsection
