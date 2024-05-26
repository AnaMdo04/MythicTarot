@extends('auth.layouts')

@section('title', 'Detalle del Diseño - MythicTarot')

@section('content')
<link href="{{ asset('css/tienda.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('storage/' . $disenio->imagen_url) }}" alt="{{ $disenio->nombre_disenio }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $disenio->nombre_disenio }}</h1>
            <h2>${{ number_format($disenio->precio, 2) }}</h2>
            <p>{{ $disenio->descripcion }}</p>
            <a href="{{ route('tienda.index') }}" class="btn btn-primary">Volver a la tienda</a>
        </div>
    </div>
</div>
@endsection
