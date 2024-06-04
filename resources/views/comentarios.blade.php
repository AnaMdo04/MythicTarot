@extends('auth.layouts')

@section('title', 'Todos los Comentarios')

@section('content')
<link href="{{ asset('css/comentarios.css') }}" rel="stylesheet">
<div class="container">
    <h1>Comentarios</h1>
    <div class="row">
        <div class="col-md-3 filter-sidebar">
            <div class="filter-container">
                <h2>Filtrar por Carta</h2>
                <form action="{{ route('comentarios') }}" method="GET">
                    <div class="filter-list" style="max-height: 200px; overflow-y: auto;">
                        @foreach ($cartas as $carta)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $carta->id }}" id="carta{{ $carta->id }}" name="cartas[]" {{ in_array($carta->id, request('cartas', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="carta{{ $carta->id }}">
                                    {{ $carta->nombre_carta }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Aplicar Filtro</button>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            @foreach ($comments as $comment)
                <div class="comment mb-3">
                    <div>
                        <div class="card-body">
                            <p class="card-text">{{ $comment->texto }}</p>
                            <p class="card-text"><small class="text-muted">Por: {{ $comment->user->name }}</small></p>
                            <p class="card-text"><small class="text-muted">Cartas:</small></p>
                            <ul>
                                @foreach ($comment->lectura->cartas as $carta)
                                    <li>{{ $carta->nombre_carta }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
