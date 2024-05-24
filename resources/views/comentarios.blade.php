@extends('auth.layouts')

@section('title', 'Todos los Comentarios')

@section('content')
<link href="{{ asset('css/comentarios.css') }}" rel="stylesheet">
<div class="container">
    <h1>Comentarios</h1>
    <div class="filter-container">
    <form action="{{ route('comentarios') }}" method="GET">
        @foreach ($cartas as $carta)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $carta->id }}" id="carta{{ $carta->id }}" name="cartas[]">
                <label class="form-check-label" for="carta{{ $carta->id }}">
                    {{ $carta->nombre_carta }}
                </label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
    </form>
</div>

    @foreach ($comments as $comment)
        <div class="comment">
            <p>{{ $comment->texto }}</p>
            <p>Por: {{ $comment->user->name }}</p>
            <p>En lectura de: {{ $comment->lectura->cards ?? 'No cards' }}</p>
        </div>
    @endforeach
    {{ $comments->links() }}
</div>
@endsection
