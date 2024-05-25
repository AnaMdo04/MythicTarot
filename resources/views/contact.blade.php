@extends('auth.layouts')

@section('title', 'Contacto - MythicTarot')

@section('content')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-form">
                <h1>Contáctanos</h1>
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" required class="form-control"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection