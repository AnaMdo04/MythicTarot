@extends('auth.layouts')

@section('title', 'Todos los Comentarios')

@section('content')

<link href="{{ asset('css/comentarios.css') }}" rel="stylesheet">
<div class="container">
    <h1>Comentarios</h1>
    <div class="filter-container">
        <form action="{{ route('comentarios') }}" method="GET">
            <input type="text" name="filter" placeholder="Buscar por carta..." value="{{ request('filter') }}">
            <button type="submit">Filtrar</button>
        </form>
    </div>
    @foreach ($comments as $comment)
        <div class="comment">
            <p>{{ $comment->texto }}</p>
            <p>Por: {{ $comment->user->name }}</p>
            <p>En lectura de: {{ $comment->lectura->cards ?? 'No cards' }}</p>
        </div>
    @endforeach
    {{ $comments->links() }} <!-- Pagination links -->
</div>
@endsection
