
@extends('auth.layouts')

@section('content')
<div class="container">
    <link href="{{ asset('css/cartas.css') }}" rel="stylesheet">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Diseños</div>
                <div class="card-body">
                    @foreach($compras as $compra)
                        @foreach($compra->disenios as $disenio)
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <img src="{{ asset('storage/' . $disenio->imagen_url) }}" alt="{{ $disenio->nombre_disenio }}" width="100">
                                    <h5 class="card-title">{{ $disenio->nombre_disenio }}</h5>
                                    <p class="card-text">{{ $disenio->descripcion }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
