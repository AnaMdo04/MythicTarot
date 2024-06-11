<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarot - MythicTarot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/tarot.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Shrikhand&display=swap');
    </style>
</head>
<body>
    <a href="{{ route('welcome') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>
    
    <div class="container">
        <h1>¡Bienvenido al Tarot!</h1>
        <p>Descubre respuestas profundas a tus preguntas con una simple tirada de tarot.</p>
        <a href="{{ route('tarot.preguntar') }}" class="btn btn-primary">Obtener Lectura</a>
        <button type="button" data-bs-toggle="modal" data-bs-target="#tiradasModal" class="info-button">
            <i class="fas fa-info-circle"></i>
        </button>
    </div>

    <div class="modal fade" id="tiradasModal" tabindex="-1" aria-labelledby="tiradasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tiradasModalLabel">¿Qué es el Tarot?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <h5>¿Qué es el Tarot?</h5>
                    <p>El Tarot es un sistema ancestral de adivinación que utiliza una baraja de cartas especiales para ofrecer guía y revelaciones sobre distintos aspectos de la vida. Cada carta del Tarot tiene un simbolismo único, y cuando se disponen en una tirada, revelan información valiosa sobre el pasado, presente y futuro.</p>
                    <h5>Historia del Tarot</h5>
                    <p>El Tarot tiene una rica historia que data del siglo XV en Europa. Aunque comenzó como un juego de cartas, fue adoptado por místicos y ocultistas como una poderosa herramienta de adivinación y autoconocimiento. Su uso ha evolucionado, y hoy en día, el Tarot es apreciado por su capacidad para brindar claridad y orientación.</p>
                    <h5>¿Cómo funcionan las lecturas de Tarot en MythicTarot?</h5>
                    <p>En MythicTarot, nuestras lecturas de Tarot son totalmente automatizadas y digitales. Al realizar una lectura, nuestro sistema baraja las cartas y las dispone en una tirada específica según el tipo de tirada que elijas. Cada posición en la tirada representa un aspecto diferente de tu pregunta o situación. Nuestro sistema interpreta las cartas y sus posiciones, proporcionando una perspectiva y guía detalladas basadas en los significados tradicionales de las cartas.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('tarot.cartas') }}" class="btn btn-secondary center-button">Ver todas las cartas</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
