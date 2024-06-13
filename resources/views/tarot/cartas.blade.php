<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarot - MythicTarot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/cartas_info.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Shrikhand&display=swap');
    </style>
</head>
<body>
    <a href="{{ route('tarot') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

<div class="container mt-5">
    <h1 class="text-center">Significados de las Cartas del Tarot</h1>
    <p class="text-center">Descubre el significado de cada carta del Tarot, tanto al derecho como al revés.</p>

    <div class="text-center mt-4">
        <button class="btn btn-secondary" onclick="showSection('arcanos-mayores')">Arcanos Mayores</button>
        <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Arcanos Menores
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="showSection('bastos')">Bastos</a></li>
                <li><a class="dropdown-item" href="#" onclick="showSection('copas')">Copas</a></li>
                <li><a class="dropdown-item" href="#" onclick="showSection('espadas')">Espadas</a></li>
                <li><a class="dropdown-item" href="#" onclick="showSection('oros')">Oros</a></li>
            </ul>
        </div>
    </div>

    <div id="arcanos-mayores" class="section" style="display: none;">
        <div class="card-deck"></div>
        <ul class="pagination"></ul>
    </div>
    <div id="bastos" class="section" style="display: none;">
        <div class="card-deck"></div>
        <ul class="pagination"></ul>
    </div>
    <div id="copas" class="section" style="display: none;">
        <div class="card-deck"></div>
        <ul class="pagination"></ul>
    </div>
    <div id="espadas" class="section" style="display: none;">
        <div class="card-deck"></div>
        <ul class="pagination"></ul>
    </div>
    <div id="oros" class="section" style="display: none;">
        <div class="card-deck"></div>
        <ul class="pagination"></ul>
    </div>
</div>

<script>
const arcanosMayores = [
    { name: "El Loco", img: src="{{ asset('cartas/el_loco.png') }}", right: "Nuevos comienzos, espontaneidad, libertad.", reverse: "Imprudencia, toma de riesgos sin pensar, caos." },
    { name: "El Mago", img: src="{{ asset('cartas/el_mago.png') }}", right: "Manifestación, poder, creatividad.", reverse: "Manipulación, engaño, falta de energía." },
    { name: "La Suma Sacerdotisa", img: src="{{ asset('cartas/la_suma_sacerdotisa.png') }}", right: "Intuición, sabiduría, conocimiento oculto.", reverse: "Secretos, desconexión de la intuición, información oculta." },
    { name: "La Emperatriz", img: src="{{ asset('cartas/la_emperatriz.png') }}", right: "Fertilidad, abundancia, naturaleza.", reverse: "Dependencia, estancamiento, falta de crecimiento." },
    { name: "El Emperador", img: src="{{ asset('cartas/el_emperador.png') }}", right: "Autoridad, estructura, control.", reverse: "Dominación, rigidez, falta de disciplina." },
    { name: "El Hierofante", img: src="{{ asset('cartas/el_hierofante.png') }}", right: "Tradición, conformidad, moralidad.", reverse: "Rebelión, subversión, nuevos enfoques." },
    { name: "Los Enamorados", img: src="{{ asset('cartas/los_enamorados.png') }}", right: "Amor, armonía, relaciones.", reverse: "Desarmonía, desequilibrio, conflicto." },
    { name: "El Carro", img: src="{{ asset('cartas/el_carro.png') }}", right: "Voluntad, éxito, determinación.", reverse: "Derrota, falta de control, obstáculos." },
    { name: "La Justicia", img: src="{{ asset('cartas/la_justicia.png') }}", right: "Justicia, verdad, equidad.", reverse: "Injusticia, deshonestidad, desequilibrio." },
    { name: "El Ermitaño", img: src="{{ asset('cartas/el_ermitano.png') }}", right: "Introspección, búsqueda de la verdad, soledad.", reverse: "Aislamiento, soledad, rechazo a la introspección." },
    { name: "La Rueda de la Fortuna", img: src="{{ asset('cartas/la_rueda.png') }}", right: "Cambio, ciclos, destino.", reverse: "Mala suerte, resistencia al cambio, inestabilidad." },
    { name: "La Fuerza", img: src="{{ asset('cartas/la_fuerza.png') }}", right: "Fuerza interior, coraje, compasión.", reverse: "Debilidad, inseguridad, falta de disciplina." },
    { name: "El Colgado", img: src="{{ asset('cartas/el_colgado.png') }}", right: "Sacrificio, entrega, nuevas perspectivas.", reverse: "Estancamiento, resistencia al cambio, martirio." },
    { name: "La Muerte", img: src="{{ asset('cartas/la_muerte.png') }}", right: "Transformación, cambio, final.", reverse: "Resistencia al cambio, miedo al cambio, estancamiento." },
    { name: "La Templanza", img: src="{{ asset('cartas/la_templanza.png') }}", right: "Equilibrio, moderación, paciencia.", reverse: "Exceso, desequilibrio, falta de armonía." },
    { name: "El Diablo", img: src="{{ asset('cartas/el_diablo.png') }}", right: "Tentación, materialismo, ataduras.", reverse: "Liberación, rompimiento de ataduras, independencia." },
    { name: "La Torre", img: src="{{ asset('cartas/la_torre.png') }}", right: "Destrucción, cambio repentino, crisis.", reverse: "Evitación de la catástrofe, resistencia al cambio, desastre inminente." },
    { name: "La Estrella", img: src="{{ asset('cartas/la_estrella.png') }}", right: "Esperanza, inspiración, serenidad.", reverse: "Desesperación, falta de fe, desilusión." },
    { name: "La Luna", img: src="{{ asset('cartas/la_luna.png') }}", right: "Ilusión, miedo, inconsciente.", reverse: "Confusión, engaño, liberación del miedo." },
    { name: "El Sol", img: src="{{ asset('cartas/el_sol.png') }}", right: "Éxito, vitalidad, alegría.", reverse: "Negatividad, depresión, falta de éxito." },
    { name: "El Juicio", img: src="{{ asset('cartas/el_juicio.png') }}", right: "Juicio, renacimiento, absolución.", reverse: "Juicio erróneo, rechazo, duda." },
    { name: "El Mundo", img: src="{{ asset('cartas/el_mundo.png') }}", right: "Finalización, logro, perfección.", reverse: "Falta de cierre, incompletitud, estancamiento." }
];

const bastos = [
    { name: "As de Bastos", img: src="{{ asset('cartas/as_de_bastos.png') }}", right: "Nuevas oportunidades, crecimiento, potencial.", reverse: "Oportunidades perdidas, falta de energía, bloqueos creativos." },
    { name: "Dos de Bastos", img: src="{{ asset('cartas/dos_de_bastos.png') }}", right: "Planificación, decisiones, progreso.", reverse: "Falta de planificación, indecisión, miedo a lo desconocido." },
    { name: "Tres de Bastos", img: src="{{ asset('cartas/tres_de_bastos.png') }}", right: "Expansión, previsión, crecimiento.", reverse: "Retrasos, falta de planificación, obstáculos." },
    { name: "Cuatro de Bastos", img: src="{{ asset('cartas/cuatro_de_bastos.png') }}", right: "Celebración, armonía, hogar.", reverse: "Conflictos familiares, falta de armonía, inestabilidad." },
    { name: "Cinco de Bastos", img: src="{{ asset('cartas/cinco_de_bastos.png') }}", right: "Conflicto, competencia, desacuerdos.", reverse: "Evitación del conflicto, resolución de desacuerdos, armonía." },
    { name: "Seis de Bastos", img: src="{{ asset('cartas/seis_de_bastos.png') }}", right: "Éxito, reconocimiento, triunfo.", reverse: "Egotismo, falta de reconocimiento, retrasos en el éxito." },
    { name: "Siete de Bastos", img: src="{{ asset('cartas/siete_de_bastos.png') }}", right: "Desafíos, defensa, perseverancia.", reverse: "Rendición, fatiga, falta de resistencia." },
    { name: "Ocho de Bastos", img: src="{{ asset('cartas/ocho_de_bastos.png') }}", right: "Movimiento rápido, acción, cambio.", reverse: "Retrasos, falta de movimiento, estancamiento." },
    { name: "Nueve de Bastos", img: src="{{ asset('cartas/nueve_de_bastos.png') }}", right: "Resiliencia, perseverancia, última lucha.", reverse: "Agotamiento, paranoia, falta de motivación." },
    { name: "Diez de Bastos", img: src="{{ asset('cartas/diez_de_bastos.png') }}", right: "Responsabilidad, carga, estrés.", reverse: "Liberación de cargas, delegación, exceso de responsabilidades." },
    { name: "Paje de Bastos", img: src="{{ asset('cartas/paje_de_bastos.png') }}", right: "Creatividad, entusiasmo, nuevas ideas.", reverse: "Falta de dirección, inmadurez, mensajes de malas noticias." },
    { name: "Caballero de Bastos", img: src="{{ asset('cartas/caballero_de_bastos.png') }}", right: "Energía, pasión, aventura.", reverse: "Impulsividad, falta de dirección, arrogancia." },
    { name: "Reina de Bastos", img: src="{{ asset('cartas/reina_de_bastos.png') }}", right: "Confianza, determinación, carisma.", reverse: "Inseguridad, celos, egoísmo." },
    { name: "Rey de Bastos", img: src="{{ asset('cartas/rey_de_bastos.png') }}", right: "Liderazgo, visión, honor.", reverse: "Tiranía, falta de dirección, agresividad." }
];

const copas = [
    { name: "As de Copas", img: src="{{ asset('cartas/as_de_copas.png') }}", right: "Nuevas relaciones, amor, creatividad.", reverse: "Bloqueo emocional, tristeza, oportunidades perdidas." },
    { name: "Dos de Copas", img: src="{{ asset('cartas/dos_de_copas.png') }}", right: "Unión, amor, sociedad.", reverse: "Ruptura, desequilibrio, falta de armonía." },
    { name: "Tres de Copas", img: src="{{ asset('cartas/tres_de_copas.png') }}", right: "Celebración, amistad, creatividad en grupo.", reverse: "Exceso, conflictos con amigos, aislamiento." },
    { name: "Cuatro de Copas", img: src="{{ asset('cartas/cuatro_de_copas.png') }}", right: "Contemplación, reevaluación, aburrimiento.", reverse: "Nuevas oportunidades, cambio de enfoque, aceptación." },
    { name: "Cinco de Copas", img: src="{{ asset('cartas/cinco_de_copas.png') }}", right: "Pérdida, arrepentimiento, tristeza.", reverse: "Aceptación, perdón, recuperación emocional." },
    { name: "Seis de Copas", img: src="{{ asset('cartas/seis_de_copas.png') }}", right: "Nostalgia, recuerdos, infancia.", reverse: "Aferrarse al pasado, falta de progreso, inmadurez." },
    { name: "Siete de Copas", img: src="{{ asset('cartas/siete_de_copas.png') }}", right: "Opciones, ilusiones, decisiones.", reverse: "Confusión, ilusiones rotas, claridad." },
    { name: "Ocho de Copas", img: src="{{ asset('cartas/ocho_de_copas.png') }}", right: "Abandono, búsqueda, cambio de dirección.", reverse: "Incapacidad para avanzar, miedo al cambio, estancamiento." },
    { name: "Nueve de Copas", img: src="{{ asset('cartas/nueve_de_copas.png') }}", right: "Satisfacción, realización, gratitud.", reverse: "Insatisfacción, indulgencia, falta de realización." },
    { name: "Diez de Copas", img: src="{{ asset('cartas/diez_de_copas.png') }}", right: "Felicidad, armonía, realización emocional.", reverse: "Conflictos familiares, falta de armonía, problemas emocionales." },
    { name: "Paje de Copas", img: src="{{ asset('cartas/paje_de_copas.png') }}", right: "Creatividad, intuición, mensajes emocionales.", reverse: "Bloqueo emocional, inmadurez, mensajes decepcionantes." },
    { name: "Caballero de Copas", img: src="{{ asset('cartas/caballero_de_copas.png') }}", right: "Romance, encanto, propuestas.", reverse: "Desilusión, engaño, falta de dirección emocional." },
    { name: "Reina de Copas", img: src="{{ asset('cartas/reina_de_copas.png') }}", right: "Intuición, compasión, cuidado.", reverse: "Inseguridad emocional, dependencia, falta de cuidado." },
    { name: "Rey de Copas", img: src="{{ asset('cartas/rey_de_copas.png') }}", right: "Control emocional, balance, generosidad.", reverse: "Manipulación emocional, frialdad, desequilibrio." }
];

const espadas = [
    { name: "As de Espadas", img: src="{{ asset('cartas/as_de_espadas.png') }}", right: "Claridad, verdad, nuevas ideas.", reverse: "Confusión, engaño, falta de comunicación." },
    { name: "Dos de Espadas", img: src="{{ asset('cartas/dos_de_espadas.png') }}", right: "Indecisión, bloqueo, compromiso.", reverse: "Resolución de conflictos, toma de decisiones, compromiso roto." },
    { name: "Tres de Espadas", img: src="{{ asset('cartas/tres_de_espadas.png') }}", right: "Dolor, traición, tristeza.", reverse: "Sanación, perdón, recuperación emocional." },
    { name: "Cuatro de Espadas", img: src="{{ asset('cartas/cuatro_de_espadas.png') }}", right: "Descanso, recuperación, reflexión.", reverse: "Agotamiento, falta de descanso, estrés." },
    { name: "Cinco de Espadas", img: src="{{ asset('cartas/cinco_de_espadas.png') }}", right: "Conflicto, derrota, desacuerdo.", reverse: "Resolución de conflictos, arrepentimiento, aceptación de la derrota." },
    { name: "Seis de Espadas", img: src="{{ asset('cartas/seis_de_espadas.png') }}", right: "Transición, cambio, movimiento.", reverse: "Resistencia al cambio, falta de progreso, estancamiento." },
    { name: "Siete de Espadas", img: src="{{ asset('cartas/siete_de_espadas.png') }}", right: "Engaño, traición, estrategia.", reverse: "Honestidad, confesión, conciencia de las consecuencias." },
    { name: "Ocho de Espadas", img: src="{{ asset('cartas/ocho_de_espadas.png') }}", right: "Restricciones, limitaciones, sentirse atrapado.", reverse: "Liberación, nuevos comienzos, superación de limitaciones." },
    { name: "Nueve de Espadas", img: src="{{ asset('cartas/nueve_de_espadas.png') }}", right: "Ansiedad, miedo, pesadillas.", reverse: "Superación de la ansiedad, esperanza, aceptación." },
    { name: "Diez de Espadas", img: src="{{ asset('cartas/diez_de_espadas.png') }}", right: "Final doloroso, traición, derrota.", reverse: "Recuperación, regeneración, resistencia." },
    { name: "Paje de Espadas", img: src="{{ asset('cartas/paje_de_espadas.png') }}", right: "Curiosidad, verdad, nuevas ideas.", reverse: "Espionaje, engaño, falta de dirección." },
    { name: "Caballero de Espadas", img: src="{{ asset('cartas/caballero_de_espadas.png') }}", right: "Acción, impulso, lucha por la justicia.", reverse: "Impulsividad, falta de estrategia, caos." },
    { name: "Reina de Espadas", img: src="{{ asset('cartas/reina_de_espadas.png') }}", right: "Verdad, independencia, percepción clara.", reverse: "Frialdad, crueldad, aislamiento." },
    { name: "Rey de Espadas", img: src="{{ asset('cartas/rey_de_espadas.png') }}", right: "Intelecto, verdad, autoridad.", reverse: "Manipulación, tiranía, abuso de poder." }
];

const oros = [
    { name: "As de Oros", img: src="{{ asset('cartas/as_de_oros.png') }}", right: "Nuevas oportunidades, prosperidad, abundancia.", reverse: "Oportunidades perdidas, falta de planificación, problemas financieros." },
    { name: "Dos de Oros", img: src="{{ asset('cartas/dos_de_oros.png') }}", right: "Balance, adaptabilidad, tiempo de administración.", reverse: "Falta de equilibrio, sobrecarga, gestión inadecuada del tiempo." },
    { name: "Tres de Oros", img: src="{{ asset('cartas/tres_de_oros.png') }}", right: "Trabajo en equipo, colaboración, aprendizaje.", reverse: "Falta de trabajo en equipo, conflicto, ineficiencia." },
    { name: "Cuatro de Oros", img: src="{{ asset('cartas/cuatro_de_oros.png') }}", right: "Seguridad, conservación, control.", reverse: "Avaricia, control excesivo, materialismo." },
    { name: "Cinco de Oros", img: src="{{ asset('cartas/cinco_de_oros.png') }}", right: "Pérdida, pobreza, dificultades.", reverse: "Recuperación, esperanza, superación de dificultades." },
    { name: "Seis de Oros", img: src="{{ asset('cartas/seis_de_oros.png') }}", right: "Generosidad, caridad, compartir.", reverse: "Egoísmo, deuda, desigualdad." },
    { name: "Siete de Oros", img: src="{{ asset('cartas/siete_de_oros.png') }}", right: "Reevaluación, paciencia, inversión.", reverse: "Impaciencia, falta de resultados, esfuerzo desperdiciado." },
    { name: "Ocho de Oros", img: src="{{ asset('cartas/ocho_de_oros.png') }}", right: "Trabajo duro, habilidad, dedicación.", reverse: "Falta de enfoque, pereza, trabajo mal hecho." },
    { name: "Nueve de Oros", img: src="{{ asset('cartas/nueve_de_oros.png') }}", right: "Abundancia, lujo, autosuficiencia.", reverse: "Dependencia, falta de seguridad, problemas financieros." },
    { name: "Diez de Oros", img: src="{{ asset('cartas/diez_de_oros.png') }}", right: "Herencia, familia, riqueza.", reverse: "Conflictos familiares, problemas financieros, pérdida." },
    { name: "Paje de Oros", img: src="{{ asset('cartas/paje_de_oros.png') }}", right: "Nuevas oportunidades, desarrollo, manifestación.", reverse: "Falta de progreso, irresponsabilidad, falta de oportunidades." },
    { name: "Caballero de Oros", img: src="{{ asset('cartas/caballero_de_oros.png') }}", right: "Trabajo duro, responsabilidad, eficiencia.", reverse: "Pereza, falta de dirección, ineficiencia." },
    { name: "Reina de Oros", img: src="{{ asset('cartas/reina_de_oros.png') }}", right: "Practicidad, seguridad, maternidad.", reverse: "Inseguridad, dependencia, falta de cuidado." },
    { name: "Rey de Oros", img: src="{{ asset('cartas/rey_de_oros.png') }}", right: "Abundancia, seguridad, liderazgo.", reverse: "Materialismo, avaricia, pérdida de control." }
];

const sections = {
    "arcanos-mayores": arcanosMayores,
    "bastos": bastos,
    "copas": copas,
    "espadas": espadas,
    "oros": oros
};

function showSection(sectionId) {
    document.querySelectorAll('.section').forEach(function (section) {
        section.style.display = 'none';
    });
    document.getElementById(sectionId).style.display = 'block';
    renderCards(sectionId);
}

function renderCards(sectionId) {
    const cards = sections[sectionId];
    const cardDeck = document.querySelector(`#${sectionId} .card-deck`);
    const pagination = document.querySelector(`#${sectionId} .pagination`);
    const cardsPerPage = 2;
    let currentPage = 1;

    function renderPagination() {
        pagination.innerHTML = '';
        const totalPages = Math.ceil(cards.length / cardsPerPage);
        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement('li');
            pageItem.className = 'page-item';
            if (i === currentPage) pageItem.classList.add('active');
            const pageLink = document.createElement('a');
            pageLink.className = 'page-link';
            pageLink.href = '#';
            pageLink.textContent = i;
            pageLink.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                renderCards();
            });
            pageItem.appendChild(pageLink);
            pagination.appendChild(pageItem);
        }
    }

    function renderCards() {
        cardDeck.innerHTML = '';
        const start = (currentPage - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        cards.slice(start, end).forEach(card => {
            const cardElement = document.createElement('div');
            cardElement.className = 'content-block';
            cardElement.innerHTML = `
                <div class="left-image-container">
                    <img src="${card.img}" alt="${card.name}" class="img-fluid">
                </div>
                <div class="right-content-container">
                    <h3>${card.name}</h3>
                    <p><strong>Al Derecho:</strong> ${card.right}</p>
                    <p><strong>Al Revés:</strong> ${card.reverse}</p>
                </div>
            `;
            cardDeck.appendChild(cardElement);
        });
        renderPagination();
    }

    renderPagination();
    renderCards();
}

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
