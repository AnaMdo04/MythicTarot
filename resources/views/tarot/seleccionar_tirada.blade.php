@extends('auth.layouts')

@section('title', 'Selecciona una Tirada - MythicTarot')

@section('content')
<div class="container">
    <h1>Selecciona una Tirada</h1>
    <form action="{{ route('tarot.realizar_tirada') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo_tirada">Elige el tipo de tirada:
                <a href="#" data-bs-toggle="modal" data-bs-target="#tiradasModal" class="text-info">
                    <i class="fas fa-info-circle"></i>
                </a>
            </label>
            <select class="form-control" id="tipo_tirada" name="tipo_tirada" required>
                <option value="simple">Tirada Simple (3 cartas)</option>
                <option value="cruz">Cruz (5 cartas)</option>
                <option value="pentaculo">Tirada del Pentáculo (6 cartas)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Realizar Tirada</button>
    </form>
</div>

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
@endsection
