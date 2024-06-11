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
    { name: "El Loco", img: "img/el_loco.jpg", right: "Nuevos comienzos, espontaneidad, libertad.", reverse: "Imprudencia, toma de riesgos sin pensar, caos." },
    { name: "El Mago", img: "img/el_mago.jpg", right: "Manifestación, poder, creatividad.", reverse: "Manipulación, engaño, falta de energía." },
    { name: "La Suma Sacerdotisa", img: "img/la_suma_sacerdotisa.jpg", right: "Intuición, sabiduría, conocimiento oculto.", reverse: "Secretos, desconexión de la intuición, información oculta." },
    { name: "La Emperatriz", img: "img/la_emperatriz.jpg", right: "Fertilidad, abundancia, naturaleza.", reverse: "Dependencia, estancamiento, falta de crecimiento." },
    { name: "El Emperador", img: "img/el_emperador.jpg", right: "Autoridad, estructura, control.", reverse: "Dominación, rigidez, falta de disciplina." },
    { name: "El Hierofante", img: "img/el_hierofante.jpg", right: "Tradición, conformidad, moralidad.", reverse: "Rebelión, subversión, nuevos enfoques." },
    { name: "Los Enamorados", img: "img/los_enamorados.jpg", right: "Amor, armonía, relaciones.", reverse: "Desarmonía, desequilibrio, conflicto." },
    { name: "El Carro", img: "img/el_carro.jpg", right: "Voluntad, éxito, determinación.", reverse: "Derrota, falta de control, obstáculos." },
    { name: "La Justicia", img: "img/la_justicia.jpg", right: "Justicia, verdad, equidad.", reverse: "Injusticia, deshonestidad, desequilibrio." },
    { name: "El Ermitaño", img: "img/el_ermitano.jpg", right: "Introspección, búsqueda de la verdad, soledad.", reverse: "Aislamiento, soledad, rechazo a la introspección." },
    { name: "La Rueda de la Fortuna", img: "img/la_rueda_de_la_fortuna.jpg", right: "Cambio, ciclos, destino.", reverse: "Mala suerte, resistencia al cambio, inestabilidad." },
    { name: "La Fuerza", img: "img/la_fuerza.jpg", right: "Fuerza interior, coraje, compasión.", reverse: "Debilidad, inseguridad, falta de disciplina." },
    { name: "El Colgado", img: "img/el_colgado.jpg", right: "Sacrificio, entrega, nuevas perspectivas.", reverse: "Estancamiento, resistencia al cambio, martirio." },
    { name: "La Muerte", img: "img/la_muerte.jpg", right: "Transformación, cambio, final.", reverse: "Resistencia al cambio, miedo al cambio, estancamiento." },
    { name: "La Templanza", img: "img/la_templanza.jpg", right: "Equilibrio, moderación, paciencia.", reverse: "Exceso, desequilibrio, falta de armonía." },
    { name: "El Diablo", img: "img/el_diablo.jpg", right: "Tentación, materialismo, ataduras.", reverse: "Liberación, rompimiento de ataduras, independencia." },
    { name: "La Torre", img: "img/la_torre.jpg", right: "Destrucción, cambio repentino, crisis.", reverse: "Evitación de la catástrofe, resistencia al cambio, desastre inminente." },
    { name: "La Estrella", img: "img/la_estrella.jpg", right: "Esperanza, inspiración, serenidad.", reverse: "Desesperación, falta de fe, desilusión." },
    { name: "La Luna", img: "img/la_luna.jpg", right: "Ilusión, miedo, inconsciente.", reverse: "Confusión, engaño, liberación del miedo." },
    { name: "El Sol", img: "img/el_sol.jpg", right: "Éxito, vitalidad, alegría.", reverse: "Negatividad, depresión, falta de éxito." },
    { name: "El Juicio", img: "img/el_juicio.jpg", right: "Juicio, renacimiento, absolución.", reverse: "Juicio erróneo, rechazo, duda." },
    { name: "El Mundo", img: "img/el_mundo.jpg", right: "Finalización, logro, perfección.", reverse: "Falta de cierre, incompletitud, estancamiento." }
];

const bastos = [
    { name: "As de Bastos", img: "img/as_de_bastos.jpg", right: "Nuevas oportunidades, crecimiento, potencial.", reverse: "Oportunidades perdidas, falta de energía, bloqueos creativos." },
    { name: "Dos de Bastos", img: "img/dos_de_bastos.jpg", right: "Planificación, decisiones, progreso.", reverse: "Falta de planificación, indecisión, miedo a lo desconocido." },
    { name: "Tres de Bastos", img: "img/tres_de_bastos.jpg", right: "Expansión, previsión, crecimiento.", reverse: "Retrasos, falta de planificación, obstáculos." },
    { name: "Cuatro de Bastos", img: "img/cuatro_de_bastos.jpg", right: "Celebración, armonía, hogar.", reverse: "Conflictos familiares, falta de armonía, inestabilidad." },
    { name: "Cinco de Bastos", img: "img/cinco_de_bastos.jpg", right: "Conflicto, competencia, desacuerdos.", reverse: "Evitación del conflicto, resolución de desacuerdos, armonía." },
    { name: "Seis de Bastos", img: "img/seis_de_bastos.jpg", right: "Éxito, reconocimiento, triunfo.", reverse: "Egotismo, falta de reconocimiento, retrasos en el éxito." },
    { name: "Siete de Bastos", img: "img/siete_de_bastos.jpg", right: "Desafíos, defensa, perseverancia.", reverse: "Rendición, fatiga, falta de resistencia." },
    { name: "Ocho de Bastos", img: "img/ocho_de_bastos.jpg", right: "Movimiento rápido, acción, cambio.", reverse: "Retrasos, falta de movimiento, estancamiento." },
    { name: "Nueve de Bastos", img: "img/nueve_de_bastos.jpg", right: "Resiliencia, perseverancia, última lucha.", reverse: "Agotamiento, paranoia, falta de motivación." },
    { name: "Diez de Bastos", img: "img/diez_de_bastos.jpg", right: "Responsabilidad, carga, estrés.", reverse: "Liberación de cargas, delegación, exceso de responsabilidades." },
    { name: "Paje de Bastos", img: "img/paje_de_bastos.jpg", right: "Creatividad, entusiasmo, nuevas ideas.", reverse: "Falta de dirección, inmadurez, mensajes de malas noticias." },
    { name: "Caballero de Bastos", img: "img/caballero_de_bastos.jpg", right: "Energía, pasión, aventura.", reverse: "Impulsividad, falta de dirección, arrogancia." },
    { name: "Reina de Bastos", img: "img/reina_de_bastos.jpg", right: "Confianza, determinación, carisma.", reverse: "Inseguridad, celos, egoísmo." },
    { name: "Rey de Bastos", img: "img/rey_de_bastos.jpg", right: "Liderazgo, visión, honor.", reverse: "Tiranía, falta de dirección, agresividad." }
];

const copas = [
    { name: "As de Copas", img: "img/as_de_copas.jpg", right: "Nuevas relaciones, amor, creatividad.", reverse: "Bloqueo emocional, tristeza, oportunidades perdidas." },
    { name: "Dos de Copas", img: "img/dos_de_copas.jpg", right: "Unión, amor, sociedad.", reverse: "Ruptura, desequilibrio, falta de armonía." },
    { name: "Tres de Copas", img: "img/tres_de_copas.jpg", right: "Celebración, amistad, creatividad en grupo.", reverse: "Exceso, conflictos con amigos, aislamiento." },
    { name: "Cuatro de Copas", img: "img/cuatro_de_copas.jpg", right: "Contemplación, reevaluación, aburrimiento.", reverse: "Nuevas oportunidades, cambio de enfoque, aceptación." },
    { name: "Cinco de Copas", img: "img/cinco_de_copas.jpg", right: "Pérdida, arrepentimiento, tristeza.", reverse: "Aceptación, perdón, recuperación emocional." },
    { name: "Seis de Copas", img: "img/seis_de_copas.jpg", right: "Nostalgia, recuerdos, infancia.", reverse: "Aferrarse al pasado, falta de progreso, inmadurez." },
    { name: "Siete de Copas", img: "img/siete_de_copas.jpg", right: "Opciones, ilusiones, decisiones.", reverse: "Confusión, ilusiones rotas, claridad." },
    { name: "Ocho de Copas", img: "img/ocho_de_copas.jpg", right: "Abandono, búsqueda, cambio de dirección.", reverse: "Incapacidad para avanzar, miedo al cambio, estancamiento." },
    { name: "Nueve de Copas", img: "img/nueve_de_copas.jpg", right: "Satisfacción, realización, gratitud.", reverse: "Insatisfacción, indulgencia, falta de realización." },
    { name: "Diez de Copas", img: "img/diez_de_copas.jpg", right: "Felicidad, armonía, realización emocional.", reverse: "Conflictos familiares, falta de armonía, problemas emocionales." },
    { name: "Paje de Copas", img: "img/paje_de_copas.jpg", right: "Creatividad, intuición, mensajes emocionales.", reverse: "Bloqueo emocional, inmadurez, mensajes decepcionantes." },
    { name: "Caballero de Copas", img: "img/caballero_de_copas.jpg", right: "Romance, encanto, propuestas.", reverse: "Desilusión, engaño, falta de dirección emocional." },
    { name: "Reina de Copas", img: "img/reina_de_copas.jpg", right: "Intuición, compasión, cuidado.", reverse: "Inseguridad emocional, dependencia, falta de cuidado." },
    { name: "Rey de Copas", img: "img/rey_de_copas.jpg", right: "Control emocional, balance, generosidad.", reverse: "Manipulación emocional, frialdad, desequilibrio." }
];

const espadas = [
    { name: "As de Espadas", img: "img/as_de_espadas.jpg", right: "Claridad, verdad, nuevas ideas.", reverse: "Confusión, engaño, falta de comunicación." },
    { name: "Dos de Espadas", img: "img/dos_de_espadas.jpg", right: "Indecisión, bloqueo, compromiso.", reverse: "Resolución de conflictos, toma de decisiones, compromiso roto." },
    { name: "Tres de Espadas", img: "img/tres_de_espadas.jpg", right: "Dolor, traición, tristeza.", reverse: "Sanación, perdón, recuperación emocional." },
    { name: "Cuatro de Espadas", img: "img/cuatro_de_espadas.jpg", right: "Descanso, recuperación, reflexión.", reverse: "Agotamiento, falta de descanso, estrés." },
    { name: "Cinco de Espadas", img: "img/cinco_de_espadas.jpg", right: "Conflicto, derrota, desacuerdo.", reverse: "Resolución de conflictos, arrepentimiento, aceptación de la derrota." },
    { name: "Seis de Espadas", img: "img/seis_de_espadas.jpg", right: "Transición, cambio, movimiento.", reverse: "Resistencia al cambio, falta de progreso, estancamiento." },
    { name: "Siete de Espadas", img: "img/siete_de_espadas.jpg", right: "Engaño, traición, estrategia.", reverse: "Honestidad, confesión, conciencia de las consecuencias." },
    { name: "Ocho de Espadas", img: "img/ocho_de_espadas.jpg", right: "Restricciones, limitaciones, sentirse atrapado.", reverse: "Liberación, nuevos comienzos, superación de limitaciones." },
    { name: "Nueve de Espadas", img: "img/nueve_de_espadas.jpg", right: "Ansiedad, miedo, pesadillas.", reverse: "Superación de la ansiedad, esperanza, aceptación." },
    { name: "Diez de Espadas", img: "img/diez_de_espadas.jpg", right: "Final doloroso, traición, derrota.", reverse: "Recuperación, regeneración, resistencia." },
    { name: "Paje de Espadas", img: "img/paje_de_espadas.jpg", right: "Curiosidad, verdad, nuevas ideas.", reverse: "Espionaje, engaño, falta de dirección." },
    { name: "Caballero de Espadas", img: "img/caballero_de_espadas.jpg", right: "Acción, impulso, lucha por la justicia.", reverse: "Impulsividad, falta de estrategia, caos." },
    { name: "Reina de Espadas", img: "img/reina_de_espadas.jpg", right: "Verdad, independencia, percepción clara.", reverse: "Frialdad, crueldad, aislamiento." },
    { name: "Rey de Espadas", img: "img/rey_de_espadas.jpg", right: "Intelecto, verdad, autoridad.", reverse: "Manipulación, tiranía, abuso de poder." }
];

const oros = [
    { name: "As de Oros", img: "img/as_de_oros.jpg", right: "Nuevas oportunidades, prosperidad, abundancia.", reverse: "Oportunidades perdidas, falta de planificación, problemas financieros." },
    { name: "Dos de Oros", img: "img/dos_de_oros.jpg", right: "Balance, adaptabilidad, tiempo de administración.", reverse: "Falta de equilibrio, sobrecarga, gestión inadecuada del tiempo." },
    { name: "Tres de Oros", img: "img/tres_de_oros.jpg", right: "Trabajo en equipo, colaboración, aprendizaje.", reverse: "Falta de trabajo en equipo, conflicto, ineficiencia." },
    { name: "Cuatro de Oros", img: "img/cuatro_de_oros.jpg", right: "Seguridad, conservación, control.", reverse: "Avaricia, control excesivo, materialismo." },
    { name: "Cinco de Oros", img: "img/cinco_de_oros.jpg", right: "Pérdida, pobreza, dificultades.", reverse: "Recuperación, esperanza, superación de dificultades." },
    { name: "Seis de Oros", img: "img/seis_de_oros.jpg", right: "Generosidad, caridad, compartir.", reverse: "Egoísmo, deuda, desigualdad." },
    { name: "Siete de Oros", img: "img/siete_de_oros.jpg", right: "Reevaluación, paciencia, inversión.", reverse: "Impaciencia, falta de resultados, esfuerzo desperdiciado." },
    { name: "Ocho de Oros", img: "img/ocho_de_oros.jpg", right: "Trabajo duro, habilidad, dedicación.", reverse: "Falta de enfoque, pereza, trabajo mal hecho." },
    { name: "Nueve de Oros", img: "img/nueve_de_oros.jpg", right: "Abundancia, lujo, autosuficiencia.", reverse: "Dependencia, falta de seguridad, problemas financieros." },
    { name: "Diez de Oros", img: "img/diez_de_oros.jpg", right: "Herencia, familia, riqueza.", reverse: "Conflictos familiares, problemas financieros, pérdida." },
    { name: "Paje de Oros", img: "img/paje_de_oros.jpg", right: "Nuevas oportunidades, desarrollo, manifestación.", reverse: "Falta de progreso, irresponsabilidad, falta de oportunidades." },
    { name: "Caballero de Oros", img: "img/caballero_de_oros.jpg", right: "Trabajo duro, responsabilidad, eficiencia.", reverse: "Pereza, falta de dirección, ineficiencia." },
    { name: "Reina de Oros", img: "img/reina_de_oros.jpg", right: "Practicidad, seguridad, maternidad.", reverse: "Inseguridad, dependencia, falta de cuidado." },
    { name: "Rey de Oros", img: "img/rey_de_oros.jpg", right: "Abundancia, seguridad, liderazgo.", reverse: "Materialismo, avaricia, pérdida de control." }
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
