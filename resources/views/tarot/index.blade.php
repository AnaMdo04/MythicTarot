@extends('auth.layouts')

@section('title', 'Tarot - MythicTarot')

@section('content')
<div class="container">
    <h1>Tarot</h1>
    <a href="{{ route('tarot.preguntar') }}" class="btn btn-primary">Hacer una pregunta</a>
</div>
@endsection
