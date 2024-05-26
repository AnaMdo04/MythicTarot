@extends('auth.layouts')

@section('title', 'Tienda - MythicTarot')

@section('content')
<link href="{{ asset('css/tienda.css') }}" rel="stylesheet">

<div class="container">
    <h1 class="my-4">Tienda</h1>
    <div class="row">
        @foreach($disenios as $disenio)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('storage/' . $disenio->imagen_url) }}" alt="{{ $disenio->nombre_disenio }}">
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
        {{ $disenios->links() }}
    </div>
</div>
@endsection
