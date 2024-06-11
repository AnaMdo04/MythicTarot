<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarot - MythicTarot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/pregunta.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Shrikhand&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <a href="{{ route('tarot') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container">
        <h1>Pregunta</h1>
        <form action="{{ route('tarot.preguntar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pregunta">¿Cuál es tu pregunta?</label>
                <input type="text" class="form-control" id="pregunta" name="pregunta" required>
            </div>

            <div class="form-group mt-4">
                <label for="tipo_tirada">Elige el tipo de tirada:</label>
                <select class="form-control" id="tipo_tirada" name="tipo_tirada" required>
                    <option value="simple">Tirada Simple (3 cartas)</option>
                    <option value="cruz">Cruz (5 cartas)</option>
                    <option value="pentaculo">Tirada del Pentáculo (6 cartas)</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary mt-3">Realizar Tirada</button>
        </form>
        <button type="button" data-bs-toggle="modal" data-bs-target="#tiradasModal" class="info-button">
            <i class="fas fa-info-circle"></i>
        </button>
    </div>

    <div class="modal fade" id="tiradasModal" tabindex="-1" aria-labelledby="tiradasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tiradasModalLabel">Tipos de Tiradas</h5>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
