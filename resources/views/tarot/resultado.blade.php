<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarot - MythicTarot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/resultado.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Shrikhand&display=swap');
    </style>
</head>
<body>
    <a href="{{ route('welcome') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container-fluid main-container">
        <div class="row">
            <div class="col-md-6 info-container">
                <h1>Resultado de la Tirada</h1>
                <p><strong>Pregunta:</strong> {{ $pregunta }}</p>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tiradasModal" class="info-button">
                    <i class="fas fa-info-circle"></i>
                </button>

                <h3>Comentario</h3>
                @foreach($lectura->comentarios as $comentario)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comentario->user->name }}</h5>
                            <p class="card-text">{{ $comentario->texto }}</p>
                            <p class="card-text"><small class="text-muted">{{ $comentario->fecha_comentario }}</small></p>
                            @if(Auth::id() == $comentario->user_id)
                                <button class="btn btn-link p-0" onclick="document.getElementById('editComentarioForm').style.display='block'">Editar Comentario</button>
                            @endif
                        </div>
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

            <div class="col-md-6 cartas-container">
                <div class="row">
                    @foreach($cartas as $carta)
                    <div class="col-md-12 mb-3">
                        <div class="card clickable-card {{ $carta->pivot->al_reves ? 'al-reves' : '' }}" onclick="mostrarCarta('{{ $carta->nombre_carta }}', '{{ $carta->imagen_url }}', '{{ $carta->pivot->al_reves }}', '{{ $carta->pivot->al_reves ? $carta->descripcion_reves : $carta->descripcion_derecho }}')">
                            <img src="{{ asset('cartas/' . $carta->imagen_url) }}" alt="{{ $carta->nombre_carta }}" class="card-img-top">
                        </div>
                    </div>
                @endforeach                
                </div>
            </div>
        </div>

        <div class="modal fade" id="tiradasModal" tabindex="-1" aria-labelledby="tiradasModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tiradasModalLabel">{{ $tipoTiradaDesc['title'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="
                        @switch($tipoTirada)
                            @case('simple')
                                {{ asset('cartas/simple.png') }}
                                @break
                            @case('cruz')
                                {{ asset('cartas/cruz.png') }}
                                @break
                            @case('pentaculo')
                                {{ asset('cartas/pentagrama.png') }}
                                @break
                        @endswitch
                        " alt="Tipo de Tirada" class="img-fluid mb-3">
                        {!! $tipoTiradaDesc['description'] !!}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('tarot.cartas') }}" class="btn btn-secondary center-button">Ver todas las cartas</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cartaModal" tabindex="-1" aria-labelledby="cartaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartaModalLabel">Detalle de la Carta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 id="cartaNombre"></h5>
                        <img id="cartaImagen" src="" alt="" class="img-fluid mb-3">
                        <p id="cartaSignificado"></p>
                        <p id="cartaDescripcion"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarCarta(nombre, imagenUrl, alReves, descripcion) {
            document.getElementById('cartaNombre').innerText = nombre;
            document.getElementById('cartaImagen').src = '{{ asset('cartas') }}/' + imagenUrl;
            document.getElementById('cartaSignificado').innerText = alReves === '1' ? 'Significado de la carta estando al revés:' : 'Significado de la carta estando al derecho:';
            document.getElementById('cartaDescripcion').innerText = descripcion;
            var cartaModal = new bootstrap.Modal(document.getElementById('cartaModal'));
            cartaModal.show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('editComentarioForm').style.display = 'none';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
