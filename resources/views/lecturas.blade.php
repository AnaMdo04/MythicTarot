@extends('auth.layouts')

@section('content')
<div class="container">
<link href="{{ asset('css/lecturas.css') }}" rel="stylesheet">
<link href="{{ asset('css/showLecturas.css') }}" rel="stylesheet">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Historial Lecturas</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('lecturas') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por pregunta, comentario o carta" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="buscar btn">Buscar</button>
                            </div>
                        </div>
                    </form>

                    @foreach($lecturas as $lectura)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">Pregunta</h5>
                                    <p class="card-text">{{ $lectura->pregunta }}</p>

                                    <h5 class="card-title">Cartas</h5>
                                    <ul>
                                        @foreach($lectura->cartas as $carta)
                                            <li>{{ $carta->nombre_carta }} @if($carta->pivot->al_reves)<span class="text-danger">(al revés)</span>@endif</li>
                                        @endforeach
                                    </ul>

                                    <h5 class="card-title">Comentarios</h5>
                                    @if($lectura->comentarios->isEmpty())
                                        <p class="card-text">No hay comentarios.</p>
                                    @else
                                        @foreach($lectura->comentarios as $comentario)
                                            <p class="card-text">{{ $comentario->texto }}</p>
                                        @endforeach
                                    @endif

                                    <a href="{{ route('lectura.show', $lectura->id) }}" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-center">
                        {{ $lecturas->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
