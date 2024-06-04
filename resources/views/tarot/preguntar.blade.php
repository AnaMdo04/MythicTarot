@extends('auth.layouts')

@section('content')
<div class="container">
    <h1>Pregunta</h1>
    <form action="{{ route('tarot.seleccionar_tirada') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pregunta">¿Cuál es tu pregunta?</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Siguiente</button>
    </form>
</div>
@endsection
