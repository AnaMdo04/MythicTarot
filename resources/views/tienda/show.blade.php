@extends('auth.layouts')

@section('title', 'Detalle del Diseño - MythicTarot')

@section('content')
<link href="{{ asset('css/tienda.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($disenio->imagenes as $index => $imagen)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($disenio->imagenes as $index => $imagen)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img class="d-block w-100" src="{{ asset('storage/' . $imagen->imagen_url) }}" alt="{{ $disenio->nombre_disenio }}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $disenio->nombre_disenio }}</h1>
            <h2>${{ number_format($disenio->precio, 2) }}</h2>
            <p>{{ $disenio->descripcion }}</p>
            <form action="{{ route('cart.add', $disenio->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Añadir al Carrito</button>
            </form>
            <h3>Comentarios</h3>
            @if($disenio->comentarios->isEmpty())
                <p>Sin comentarios disponibles</p>
            @else
                @foreach($disenio->comentarios as $comentario)
                    <div class="content-block small">
                        <div class="small-image-container">
                            <img src="{{ $comentario->user->profile_image ? asset('storage/' . $comentario->user->profile_image) : 'https://use.fontawesome.com/releases/v5.15.4/svgs/solid/user-circle.svg' }}" alt="Usuario {{ $comentario->user->name }}" class="rounded-circle">
                        </div>
                        <div class="card-content">
                            <h5>{{ $comentario->user->name }}</h5>
                            <p>{{ $comentario->texto }}</p>
                            <p><small>{{ \Carbon\Carbon::parse($comentario->fecha_comentario)->format('d/m/Y') }}</small></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
