@extends('auth.layouts')

@section('content')
<div class="container">
    <link href="{{ asset('css/lecturas.css') }}" rel="stylesheet">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de la Lectura</div>

                <div class="card-body">

                    <h5 class="card-title">Fecha y Hora de la Lectura: {{ $lectura->fecha_lectura }}</h5>
                    <p><strong>Pregunta:</strong> {{ $lectura->pregunta }}</p>
                    
                    <h5 class="mt-4">Cartas Seleccionadas:</h5>
                    <div class="row">
                        @foreach ($lectura->cartas as $carta)
                            <div class="col-md-4">
                                <div class="card mb-3 {{ $carta->pivot->al_reves ? 'al-reves' : '' }}">
                                    <img src="{{ asset('storage/' . $carta->imagen_url) }}" class="card-img-top" alt="{{ $carta->nombre_carta }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $carta->nombre_carta }}</h5>
                                        <p class="card-text">{{ $carta->descripcion }}</p>
                                        @if($carta->pivot->al_reves)
                                            <p class="text-danger">Esta carta está al revés</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <h5 class="mt-4">Comentario:</h5>
                    @if ($lectura->comentarios->isNotEmpty())
                        @foreach ($lectura->comentarios as $comentario)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-text">{{ $comentario->texto }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $comentario->fecha_comentario }}</small></p>
                                    <button class="btn p-0" onclick="toggleEditForm()">Editar Comentario</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No hay comentarios.</p>
                        <button class="btn btn-primary" onclick="toggleAddForm()">Añadir Comentario</button>
                    @endif

                    <form method="POST" action="{{ route('tarot.guardarComentario', $lectura->id) }}" id="addComentarioForm" style="display: none;">
                        @csrf
                        <div class="form-group">
                            <label for="texto">Añadir Comentario</label>
                            <textarea class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Guardar Comentario</button>
                    </form>

                    @if ($lectura->comentarios->isNotEmpty())
                        <form method="POST" action="{{ route('tarot.updateComentario', $lectura->comentarios->first()->id) }}" id="editComentarioForm" style="display: none;">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="texto">Editar Comentario</label>
                                <textarea class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" rows="3">{{ old('texto', $lectura->comentarios->first()->texto ?? '') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('lectura.destroy', $lectura->id) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Lectura</button>
                    </form>

                    <a href="{{ route('lecturas') }}" class="btn btn-secondary mt-3">Volver a Mis Lecturas</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAddForm() {
        document.getElementById('addComentarioForm').style.display = 'block';
        document.getElementById('editComentarioForm').style.display = 'none';
    }

    function toggleEditForm() {
        document.getElementById('editComentarioForm').style.display = 'block';
        document.getElementById('addComentarioForm').style.display = 'none';
    }
</script>
@endsection
