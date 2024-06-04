@extends('auth.layouts')

@section('title', 'Resultado de la Tirada - MythicTarot')

@section('content')
<div class="container">
    <h1>Resultado de la Tirada</h1>
    <p><strong>Pregunta:</strong> {{ $pregunta }}</p>
    <p><strong>Fecha de la Lectura:</strong> {{ $lectura->fecha_lectura }}</p>
    <a href="#" data-bs-toggle="modal" data-bs-target="#tiradasModal" class="text-info">
        <i class="fas fa-info-circle"></i>
    </a>
    <div class="row mt-3">
        @foreach($cartas as $carta)
            <div class="col-md-4">
                <div class="card {{ $carta->al_reves ? 'al-reves' : '' }}">
                    <img src="{{ asset('storage/' . $carta->imagen_url) }}" alt="{{ $carta->nombre_carta }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $carta->nombre_carta }}</h5>
                        <p class="card-text">{{ $carta->descripcion }}</p>
                        @if($carta->al_reves)
                            <p class="text-danger">Esta carta está al revés</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h3>Comentarios</h3>
    @foreach($lectura->comentarios as $comentario)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $comentario->user->name }}</h5>
                <p class="card-text">{{ $comentario->texto }}</p>
                <p class="card-text"><small class="text-muted">{{ $comentario->fecha_comentario }}</small></p>
                @if(Auth::id() == $comentario->user_id)
                    <button class="btn btn-link p-0" onclick="toggleEditForm()">Editar Comentario</button>
                @endif
            </div>
        @endforeach
    @if($lectura->comentarios->isEmpty() || $lectura->comentarios->where('user_id', Auth::id())->isEmpty())
        <form action="{{ route('tarot.guardarComentario', ['lectura_id' => $lectura->id]) }}" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="texto">Escribe tu comentario:</label>
                <textarea name="texto" id="texto" rows="3" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Guardar Comentario</button>
        </form>
    @endif

    <form method="POST" action="{{ route('lectura.update', $lectura->id) }}" id="editComentarioForm" style="display: none;">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="comentario">Editar Comentario</label>
            <textarea class="form-control @error('comentario') is-invalid @enderror" id="comentario" name="comentario" rows="3">{{ old('comentario', $lectura->comentarios->first()->texto ?? '') }}</textarea>
            @error('comentario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="tiradasModal" tabindex="-1" aria-labelledby="tiradasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tiradasModalLabel">Descripción de las Tiradas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Tirada Simple (3 cartas)</h5>
                <p>Primera carta: pasado<br>Segunda carta: presente<br>Tercera carta: futuro</p>
                <h5>Tirada Cruz (5 cartas)</h5>
                <p>Primera carta: situación actual<br>Segunda carta: desafíos<br>Tercera carta: pasado<br>Cuarta carta: futuro<br>Quinta carta: potencial</p>
                <h5>Tirada del Pentáculo (6 cartas)</h5>
                <p>Primera carta: causa<br>Segunda carta: efecto<br>Tercera carta: consecuencia<br>Cuarta carta: solución<br>Quinta carta: obstáculo<br>Sexta carta: resultado</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleEditForm() {
        const form = document.getElementById('editComentarioForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
