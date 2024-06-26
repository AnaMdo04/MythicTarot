@extends('auth.layouts')

@section('title', 'Inicio - MythicTarot')

@section('content')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

<div class="row my-3">
    <div class="col-12">
        <div class="content-block large">
            <div class="left-image-container">
                <img src="{{ asset('img/imagen_principal.webp') }}" alt="Imagen Presentación" class="img-fluid">
            </div>
            <div class="right-content-container">
                <h1>Descubre tu futuro con MythicTarot</h1>
                <p>Explora el poder del tarot para desvelar los secretos de tu destino.</p>
                <p>Únete hoy y realiza tu primera lectura de tarot.</p>
                <a class="btn btn-primary btn-block" href="{{ route('tarot') }}">Lectura del Tarot</a>
            </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-12">
        <div class="content-block large unique-designs">
            <div class="right-content-container">
                <h1>¡Diseños Únicos!</h1>
                <p>Visita nuestra tienda para explorar diseños exclusivos de cartas de tarot diseñados por artistas destacados.</p>
                <a class="btn btn-primary btn-block" href="{{ route('tienda.index') }}">Visitar Tienda</a>
            </div>
            <div class="left-image-container">
                <img src="{{ asset('img/diseniosCartas.webp') }}" alt="Tienda" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 text-center">
        <h2>Comentarios de Nuestros Usuarios</h2>
<div class="row my-3">
    @foreach ($smallBlocks as $block)
    <div class="col-md-4">
        <div class="content-block small">
            <div class="small-image-container">
                <img src="{{ $block->user->profile_image ? asset('storage/' . $block->user->profile_image) : 'https://use.fontawesome.com/releases/v5.15.4/svgs/solid/user-circle.svg' }}" alt="Usuario {{ $block->user->name }}" class="rounded-circle">
            </div>
            <div class="card-content">
                <h5>{{ $block->user->name }}</h5>
                <p>{{ $block->texto }}</p>
                <p><small>{{ \Carbon\Carbon::parse($block->fecha_comentario)->format('d/m/Y') }}</small></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
        <a href="{{ route('comentarios') }}" class="btn btn-primary">Ver todos los comentarios</a>
    </div>
</div>

@endsection
