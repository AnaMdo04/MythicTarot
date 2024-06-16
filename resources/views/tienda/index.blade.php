@extends('auth.layouts')

@section('title', 'Tienda - MythicTarot')

@section('content')
<link href="{{ asset('css/tienda.css') }}" rel="stylesheet">
<link href="{{ asset('css/showLecturas.css') }}" rel="stylesheet">

<div class="container">
    <h1 class="my-4">Tienda</h1>

    <form method="GET" action="{{ route('tienda.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre de diseño" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn buscar">Buscar</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($disenios as $disenio)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    @if ($disenio->imagenes->isNotEmpty())
                        @php
                            $imagen = $disenio->imagenes->random();
                        @endphp
                        <img class="card-img-top" src="{{ asset('tiendaImagen/' . $imagen->imagen_url) }}" alt="{{ $disenio->nombre_disenio }}">
                    @else
                        <img class="card-img-top" src="{{ asset('tiendaImagen/disenioTarot.png') }}" alt="{{ $disenio->nombre_disenio }}">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ $disenio->nombre_disenio }}</h4>
                        <h5>${{ number_format($disenio->precio, 2) }}</h5>
                        <p class="card-text">{{ Str::limit($disenio->descripcion, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('tienda.show', $disenio->id) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination-container">
        {{ $disenios->appends(request()->query())->links() }}
    </div>
</div>
@endsection
