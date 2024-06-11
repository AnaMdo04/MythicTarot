<!DOCTYPE html>
<html lang="en">
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
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <a href="{{ route('welcome') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>
    
    <div class="container">
        <h1>¡Bienvenido al Tarot!</h1>
        <p>Resuelva todas sus dudas y preguntas con una simple pregunta a nuestro tarot.</p>
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
                    <p>El Tarot es un sistema de adivinación que utiliza una baraja de cartas para obtener información y guía sobre diferentes aspectos de la vida. Cada carta del tarot tiene un significado específico, y al ser combinadas en una tirada, pueden proporcionar una visión profunda y reveladora sobre el pasado, presente y futuro.</p>
                    <h5>Historia del Tarot</h5>
                    <p>El origen del Tarot se remonta al siglo XV en Europa, aunque algunos creen que tiene raíces más antiguas en Egipto o India. Originalmente utilizado como un juego de cartas, el Tarot fue adoptado más tarde por los místicos y ocultistas como una herramienta de adivinación y autoconocimiento.</p>
                    <h5>¿Cómo funciona una lectura de Tarot?</h5>
                    <p>En una lectura de Tarot, el lector baraja las cartas y las dispone en un patrón específico llamado "tirada". Cada posición en la tirada representa un aspecto diferente de la pregunta o situación del consultante. El lector interpreta las cartas en función de sus posiciones y combinaciones, ofreciendo una perspectiva y orientación basadas en los significados tradicionales de las cartas.</p>
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
