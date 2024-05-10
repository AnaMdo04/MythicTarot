@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <!-- Imagen a la izquierda, como en la página de inicio de sesión -->
        <div class="col-md-6 login-image">
            <img src="{{ asset('css/register.jpeg') }}" alt="Register Image" class="img-fluid">
        </div>
        <!-- Formulario a la derecha -->
        <div class="col-md-6">
            <div class="login-form">
                <h2>Registrarse</h2>
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" required value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo Electrónico" required value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection