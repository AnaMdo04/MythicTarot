@extends('auth.layouts')

@section('title', 'Inicio - MythicTarot')

@section('content')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-12 text-center my-3">
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">
                <div class="left-image-container">
                    <img src="{{ asset('path/to/your/image.jpg') }}" alt="Imagen Presentación" class="img-fluid">
                </div>
                <div class="right-content-container">
                    <p>¡Bienvenido a MythicTarot!</p>
                        <a class="btn btn-primary btn-block" href="{{ route('login') }}">Unirse</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <div class="content-block medium"></div>
        </div>
        <div class="col-md-6">
            <div class="content-block medium"></div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">
                <div class="right-content-container">
                    <p>¡Bienvenido a MythicTarot!</p>
                        <a class="btn btn-primary btn-block" href="{{ route('tienda') }}">Comprar</a>
                </div>   
                <div class="left-image-container">
                    <img src="{{ asset('path/to/your/image.jpg') }}" alt="Imagen Presentación" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-4">
            <div class="content-block small">
            <div class="image-container">
                    <img src="{{ asset('path/to/your/image.jpg') }}" alt="Imagen Presentación" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
    </div>
</div>
@endsection
