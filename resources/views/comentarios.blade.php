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
                                <input class="form-check-input" type="checkbox" value="{{ $carta->id }}" id="carta{{ $carta->id }}" name="cartas[]">
                                <label class="form-check-label" for="carta{{ $carta->id }}">
                                    {{ $carta->nombre_carta }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            @foreach ($comments as $comment)
                <div class="comment">
                    <p>{{ $comment->texto }}</p>
                    <p>Por: {{ $comment->user->name }}</p>
                    <p>En lectura de: {{ $comment->lectura->cards ?? 'No cards' }}</p>
                </div>
            @endforeach
            <div class="pagination">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
