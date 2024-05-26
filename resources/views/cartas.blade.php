@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Cartas</div>

                <div class="card-body">
                    @foreach($cartas as $carta)
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . $carta->imagen_url) }}" alt="{{ $carta->nombre_carta }}" width="100">
                            <h5 class="card-title">{{ $carta->nombre_carta }}</h5>
                            <p class="card-text">{{ $carta->descripcion }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection