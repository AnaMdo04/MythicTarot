@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">HISTORIAL LECTURAS</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @foreach($lecturas as $lectura)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('images/tarot-card.png') }}" class="card-img" alt="Imagen Cartas">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pregunta</h5>
                                    <p class="card-text">{{ $lectura->pregunta }}</p>
                                    <h5 class="card-title">Respuesta</h5>
                                    <p class="card-text">{{ Str::limit($lectura->respuesta, 100) }}</p>
                                    <h5 class="card-title">Comentario</h5>
                                    <p class="card-text">{{ $lectura->comentario }}</p>
                                    <a href="{{ route('lectura.show', $lectura->id) }}" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-header,
    .btn-primary {
        background-color: #ddbea9;
        border-color: #ddbea9;
    }

    .btn-primary:hover {
        background-color: #ac7b75;
        border-color: #ac7b75;
    }
</style>
@endsection