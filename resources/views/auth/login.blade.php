@extends('auth.layouts')

@section('content')

<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 login-image">
            <img src="{{ asset('css/login.jpeg')  }}" alt="Login Image">
        </div>
        <div class="col-md-6">
            <div class="login-form">
                <h2>Iniciar Sesión</h2>
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required value="{{ old('email') }}">
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
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-block">Registrar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection