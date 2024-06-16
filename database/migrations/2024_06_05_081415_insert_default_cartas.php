<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Artista;
use App\Models\Disenio;
use App\Models\Carta;

class InsertDefaultCartas extends Migration
{
    public function up()
    {
        DB::transaction(function () {
            $adminUser = User::firstOrCreate([
                'email' => 'admin@mythictarot.com',
            ], [
                'name' => 'Admin User',
                'password' => bcrypt('adminpassword'),
                'is_artist' => true,
            ]);

            $artista = Artista::firstOrCreate([
                'nombre_artista' => 'Artista Predeterminado',
            ], [
                'biografia' => 'Biografía del Artista Predeterminado',
            ]);

            $disenio = Disenio::firstOrCreate([
                'nombre_disenio' => 'Diseño de Nuestro Tarot',
                'descripcion' => 'Un diseño elegante y moderno para todas las ocasiones.',
                'artista_id' => $artista->id,
            ], [
                'precio' => 10.00,
                'imagen_url' => 'diseñoTarot.png',
            ]);

            $cartas = [
                ['nombre_carta' => 'El Loco', 'descripcion_derecho' => 'Nuevos comienzos, espontaneidad, libertad.', 'descripcion_reves' => 'Imprudencia, toma de riesgos sin pensar, caos.', 'imagen_url' => 'el_loco.png'],
                ['nombre_carta' => 'El Mago', 'descripcion_derecho' => 'Manifestación, poder, creatividad.', 'descripcion_reves' => 'Manipulación, engaño, falta de energía.', 'imagen_url' => 'el_mago.png'],
                ['nombre_carta' => 'La Suma Sacerdotisa', 'descripcion_derecho' => 'Intuición, sabiduría, conocimiento oculto.', 'descripcion_reves' => 'Secretos, desconexión de la intuición, información oculta.', 'imagen_url' => 'la_suma_sacerdotisa.png'],
                ['nombre_carta' => 'La Emperatriz', 'descripcion_derecho' => 'Fertilidad, abundancia, naturaleza.', 'descripcion_reves' => 'Dependencia, estancamiento, falta de crecimiento.', 'imagen_url' => 'la_emperatriz.png'],
                ['nombre_carta' => 'El Emperador', 'descripcion_derecho' => 'Autoridad, estructura, control.', 'descripcion_reves' => 'Dominación, rigidez, falta de disciplina.', 'imagen_url' => 'el_emperador.png'],
                ['nombre_carta' => 'El Hierofante', 'descripcion_derecho' => 'Tradición, conformidad, moralidad.', 'descripcion_reves' => 'Rebelión, subversión, nuevos enfoques.', 'imagen_url' => 'el_hierofante.png'],
                ['nombre_carta' => 'Los Enamorados', 'descripcion_derecho' => 'Amor, armonía, relaciones.', 'descripcion_reves' => 'Desarmonía, desequilibrio, conflicto.', 'imagen_url' => 'los_enamorados.png'],
                ['nombre_carta' => 'El Carro', 'descripcion_derecho' => 'Voluntad, éxito, determinación.', 'descripcion_reves' => 'Derrota, falta de control, obstáculos.', 'imagen_url' => 'el_carro.png'],
                ['nombre_carta' => 'La Justicia', 'descripcion_derecho' => 'Justicia, verdad, equidad.', 'descripcion_reves' => 'Injusticia, deshonestidad, desequilibrio.', 'imagen_url' => 'la_justicia.png'],
                ['nombre_carta' => 'El Ermitaño', 'descripcion_derecho' => 'Introspección, búsqueda de la verdad, soledad.', 'descripcion_reves' => 'Aislamiento, soledad, rechazo a la introspección.', 'imagen_url' => 'el_ermitano.png'],
                ['nombre_carta' => 'La Rueda de la Fortuna', 'descripcion_derecho' => 'Cambio, ciclos, destino.', 'descripcion_reves' => 'Mala suerte, resistencia al cambio, inestabilidad.', 'imagen_url' => 'la_rueda.png'],
                ['nombre_carta' => 'La Fuerza', 'descripcion_derecho' => 'Fuerza interior, coraje, compasión.', 'descripcion_reves' => 'Debilidad, inseguridad, falta de disciplina.', 'imagen_url' => 'la_fuerza.png'],
                ['nombre_carta' => 'El Colgado', 'descripcion_derecho' => 'Sacrificio, entrega, nuevas perspectivas.', 'descripcion_reves' => 'Estancamiento, resistencia al cambio, martirio.', 'imagen_url' => 'el_colgado.png'],
                ['nombre_carta' => 'La Muerte', 'descripcion_derecho' => 'Transformación, cambio, final.', 'descripcion_reves' => 'Resistencia al cambio, miedo al cambio, estancamiento.', 'imagen_url' => 'la_muerte.png'],
                ['nombre_carta' => 'La Templanza', 'descripcion_derecho' => 'Equilibrio, moderación, paciencia.', 'descripcion_reves' => 'Exceso, desequilibrio, falta de armonía.', 'imagen_url' => 'la_templanza.png'],
                ['nombre_carta' => 'El Diablo', 'descripcion_derecho' => 'Tentación, materialismo, ataduras.', 'descripcion_reves' => 'Liberación, rompimiento de ataduras, independencia.', 'imagen_url' => 'el_diablo.png'],
                ['nombre_carta' => 'La Torre', 'descripcion_derecho' => 'Destrucción, cambio repentino, crisis.', 'descripcion_reves' => 'Evitación de la catástrofe, resistencia al cambio, desastre inminente.', 'imagen_url' => 'la_torre.png'],
                ['nombre_carta' => 'La Estrella', 'descripcion_derecho' => 'Esperanza, inspiración, serenidad.', 'descripcion_reves' => 'Desesperación, falta de fe, desilusión.', 'imagen_url' => 'la_estrella.png'],
                ['nombre_carta' => 'La Luna', 'descripcion_derecho' => 'Ilusión, miedo, inconsciente.', 'descripcion_reves' => 'Confusión, engaño, liberación del miedo.', 'imagen_url' => 'la_luna.png'],
                ['nombre_carta' => 'El Sol', 'descripcion_derecho' => 'Éxito, vitalidad, alegría.', 'descripcion_reves' => 'Negatividad, depresión, falta de éxito.', 'imagen_url' => 'el_sol.png'],
                ['nombre_carta' => 'El Juicio', 'descripcion_derecho' => 'Juicio, renacimiento, absolución.', 'descripcion_reves' => 'Juicio erróneo, rechazo, duda.', 'imagen_url' => 'el_juicio.png'],
                ['nombre_carta' => 'El Mundo', 'descripcion_derecho' => 'Finalización, logro, perfección.', 'descripcion_reves' => 'Falta de cierre, incompletitud, estancamiento.', 'imagen_url' => 'el_mundo.png'],
                ['nombre_carta' => 'As de Copas', 'descripcion_derecho' => 'Nuevas relaciones, amor, creatividad.', 'descripcion_reves' => 'Bloqueo emocional, tristeza, oportunidades perdidas.', 'imagen_url' => 'as_de_copas.png'],
                ['nombre_carta' => 'Dos de Copas', 'descripcion_derecho' => 'Unión, amor, sociedad.', 'descripcion_reves' => 'Ruptura, desequilibrio, falta de armonía.', 'imagen_url' => 'dos_de_copas.png'],
                ['nombre_carta' => 'Tres de Copas', 'descripcion_derecho' => 'Celebración, amistad, creatividad en grupo.', 'descripcion_reves' => 'Exceso, conflictos con amigos, aislamiento.', 'imagen_url' => 'tres_de_copas.png'],
                ['nombre_carta' => 'Cuatro de Copas', 'descripcion_derecho' => 'Contemplación, reevaluación, aburrimiento.', 'descripcion_reves' => 'Nuevas oportunidades, cambio de enfoque, aceptación.', 'imagen_url' => 'cuatro_de_copas.png'],
                ['nombre_carta' => 'Cinco de Copas', 'descripcion_derecho' => 'Pérdida, arrepentimiento, tristeza.', 'descripcion_reves' => 'Aceptación, perdón, recuperación emocional.', 'imagen_url' => 'cinco_de_copas.png'],
                ['nombre_carta' => 'Seis de Copas', 'descripcion_derecho' => 'Nostalgia, recuerdos, infancia.', 'descripcion_reves' => 'Aferrarse al pasado, falta de progreso, inmadurez.', 'imagen_url' => 'seis_de_copas.png'],
                ['nombre_carta' => 'Siete de Copas', 'descripcion_derecho' => 'Opciones, ilusiones, decisiones.', 'descripcion_reves' => 'Confusión, ilusiones rotas, claridad.', 'imagen_url' => 'siete_de_copas.png'],
                ['nombre_carta' => 'Ocho de Copas', 'descripcion_derecho' => 'Abandono, búsqueda, cambio de dirección.', 'descripcion_reves' => 'Incapacidad para avanzar, miedo al cambio, estancamiento.', 'imagen_url' => 'ocho_de_copas.png'],
                ['nombre_carta' => 'Nueve de Copas', 'descripcion_derecho' => 'Satisfacción, realización, gratitud.', 'descripcion_reves' => 'Insatisfacción, indulgencia, falta de realización.', 'imagen_url' => 'nueve_de_copas.png'],
                ['nombre_carta' => 'Diez de Copas', 'descripcion_derecho' => 'Felicidad, armonía, realización emocional.', 'descripcion_reves' => 'Conflictos familiares, falta de armonía, problemas emocionales.', 'imagen_url' => 'diez_de_copas.png'],
                ['nombre_carta' => 'Paje de Copas', 'descripcion_derecho' => 'Creatividad, intuición, mensajes emocionales.', 'descripcion_reves' => 'Bloqueo emocional, inmadurez, mensajes decepcionantes.', 'imagen_url' => 'paje_de_copas.png'],
                ['nombre_carta' => 'Caballero de Copas', 'descripcion_derecho' => 'Romance, encanto, propuestas.', 'descripcion_reves' => 'Desilusión, engaño, falta de dirección emocional.', 'imagen_url' => 'caballero_de_copas.png'],
                ['nombre_carta' => 'Reina de Copas', 'descripcion_derecho' => 'Intuición, compasión, cuidado.', 'descripcion_reves' => 'Inseguridad emocional, dependencia, falta de cuidado.', 'imagen_url' => 'reina_de_copas.png'],
                ['nombre_carta' => 'Rey de Copas', 'descripcion_derecho' => 'Control emocional, balance, generosidad.', 'descripcion_reves' => 'Manipulación emocional, frialdad, desequilibrio.', 'imagen_url' => 'rey_de_copas.png'],
                ['nombre_carta' => 'As de Oros', 'descripcion_derecho' => 'Nuevas oportunidades, prosperidad, abundancia.', 'descripcion_reves' => 'Oportunidades perdidas, falta de planificación, problemas financieros.', 'imagen_url' => 'as_de_oros.png'],
                ['nombre_carta' => 'Dos de Oros', 'descripcion_derecho' => 'Balance, adaptabilidad, tiempo de administración.', 'descripcion_reves' => 'Falta de equilibrio, sobrecarga, gestión inadecuada del tiempo.', 'imagen_url' => 'dos_de_oros.png'],
                ['nombre_carta' => 'Tres de Oros', 'descripcion_derecho' => 'Trabajo en equipo, colaboración, aprendizaje.', 'descripcion_reves' => 'Falta de trabajo en equipo, conflicto, ineficiencia.', 'imagen_url' => 'tres_de_oros.png'],
                ['nombre_carta' => 'Cuatro de Oros', 'descripcion_derecho' => 'Seguridad, conservación, control.', 'descripcion_reves' => 'Avaricia, control excesivo, materialismo.', 'imagen_url' => 'cuatro_de_oros.png'],
                ['nombre_carta' => 'Cinco de Oros', 'descripcion_derecho' => 'Pérdida, pobreza, dificultades.', 'descripcion_reves' => 'Recuperación, esperanza, superación de dificultades.', 'imagen_url' => 'cinco_de_oros.png'],
                ['nombre_carta' => 'Seis de Oros', 'descripcion_derecho' => 'Generosidad, caridad, compartir.', 'descripcion_reves' => 'Egoísmo, deuda, desigualdad.', 'imagen_url' => 'seis_de_oros.png'],
                ['nombre_carta' => 'Siete de Oros', 'descripcion_derecho' => 'Reevaluación, paciencia, inversión.', 'descripcion_reves' => 'Impaciencia, falta de resultados, esfuerzo desperdiciado.', 'imagen_url' => 'siete_de_oros.png'],
                ['nombre_carta' => 'Ocho de Oros', 'descripcion_derecho' => 'Trabajo duro, habilidad, dedicación.', 'descripcion_reves' => 'Falta de enfoque, pereza, trabajo mal hecho.', 'imagen_url' => 'ocho_de_oros.png'],
                ['nombre_carta' => 'Nueve de Oros', 'descripcion_derecho' => 'Abundancia, lujo, autosuficiencia.', 'descripcion_reves' => 'Dependencia, falta de seguridad, problemas financieros.', 'imagen_url' => 'nueve_de_oros.png'],
                ['nombre_carta' => 'Diez de Oros', 'descripcion_derecho' => 'Herencia, familia, riqueza.', 'descripcion_reves' => 'Conflictos familiares, problemas financieros, pérdida.', 'imagen_url' => 'diez_de_oros.png'],
                ['nombre_carta' => 'Paje de Oros', 'descripcion_derecho' => 'Nuevas oportunidades, desarrollo, manifestación.', 'descripcion_reves' => 'Falta de progreso, irresponsabilidad, falta de oportunidades.', 'imagen_url' => 'paje_de_oros.png'],
                ['nombre_carta' => 'Caballero de Oros', 'descripcion_derecho' => 'Trabajo duro, responsabilidad, eficiencia.', 'descripcion_reves' => 'Pereza, falta de dirección, ineficiencia.', 'imagen_url' => 'caballero_de_oros.png'],
                ['nombre_carta' => 'Reina de Oros', 'descripcion_derecho' => 'Practicidad, seguridad, maternidad.', 'descripcion_reves' => 'Inseguridad, dependencia, falta de cuidado.', 'imagen_url' => 'reina_de_oros.png'],
                ['nombre_carta' => 'Rey de Oros', 'descripcion_derecho' => 'Abundancia, seguridad, liderazgo.', 'descripcion_reves' => 'Materialismo, avaricia, pérdida de control.', 'imagen_url' => 'rey_de_oros.png'],
                ['nombre_carta' => 'As de Espadas', 'descripcion_derecho' => 'Claridad, verdad, nuevas ideas.', 'descripcion_reves' => 'Confusión, engaño, falta de comunicación.', 'imagen_url' => 'as_de_espadas.png'],
                ['nombre_carta' => 'Dos de Espadas', 'descripcion_derecho' => 'Indecisión, bloqueo, compromiso.', 'descripcion_reves' => 'Resolución de conflictos, toma de decisiones, compromiso roto.', 'imagen_url' => 'dos_de_espadas.png'],
                ['nombre_carta' => 'Tres de Espadas', 'descripcion_derecho' => 'Dolor, traición, tristeza.', 'descripcion_reves' => 'Sanación, perdón, recuperación emocional.', 'imagen_url' => 'tres_de_espadas.png'],
                ['nombre_carta' => 'Cuatro de Espadas', 'descripcion_derecho' => 'Descanso, recuperación, reflexión.', 'descripcion_reves' => 'Agotamiento, falta de descanso, estrés.', 'imagen_url' => 'cuatro_de_espadas.png'],
                ['nombre_carta' => 'Cinco de Espadas', 'descripcion_derecho' => 'Conflicto, derrota, desacuerdo.', 'descripcion_reves' => 'Resolución de conflictos, arrepentimiento, aceptación de la derrota.', 'imagen_url' => 'cinco_de_espadas.png'],
                ['nombre_carta' => 'Seis de Espadas', 'descripcion_derecho' => 'Transición, cambio, movimiento.', 'descripcion_reves' => 'Resistencia al cambio, falta de progreso, estancamiento.', 'imagen_url' => 'seis_de_espadas.png'],
                ['nombre_carta' => 'Siete de Espadas', 'descripcion_derecho' => 'Engaño, traición, estrategia.', 'descripcion_reves' => 'Honestidad, confesión, conciencia de las consecuencias.', 'imagen_url' => 'siete_de_espadas.png'],
                ['nombre_carta' => 'Ocho de Espadas', 'descripcion_derecho' => 'Restricciones, limitaciones, sentirse atrapado.', 'descripcion_reves' => 'Liberación, nuevos comienzos, superación de limitaciones.', 'imagen_url' => 'ocho_de_espadas.png'],
                ['nombre_carta' => 'Nueve de Espadas', 'descripcion_derecho' => 'Ansiedad, miedo, pesadillas.', 'descripcion_reves' => 'Superación de la ansiedad, esperanza, aceptación.', 'imagen_url' => 'nueve_de_espadas.png'],
                ['nombre_carta' => 'Diez de Espadas', 'descripcion_derecho' => 'Final doloroso, traición, derrota.', 'descripcion_reves' => 'Recuperación, regeneración, resistencia.', 'imagen_url' => 'diez_de_espadas.png'],
                ['nombre_carta' => 'Paje de Espadas', 'descripcion_derecho' => 'Curiosidad, verdad, nuevas ideas.', 'descripcion_reves' => 'Espionaje, engaño, falta de dirección.', 'imagen_url' => 'paje_de_espadas.png'],
                ['nombre_carta' => 'Caballero de Espadas', 'descripcion_derecho' => 'Acción, impulso, lucha por la justicia.', 'descripcion_reves' => 'Impulsividad, falta de estrategia, caos.', 'imagen_url' => 'caballero_de_espadas.png'],
                ['nombre_carta' => 'Reina de Espadas', 'descripcion_derecho' => 'Verdad, independencia, percepción clara.', 'descripcion_reves' => 'Frialdad, crueldad, aislamiento.', 'imagen_url' => 'reina_de_espadas.png'],
                ['nombre_carta' => 'Rey de Espadas', 'descripcion_derecho' => 'Intelecto, verdad, autoridad.', 'descripcion_reves' => 'Manipulación, tiranía, abuso de poder.', 'imagen_url' => 'rey_de_espadas.png'],
                ['nombre_carta' => 'As de Bastos', 'descripcion_derecho' => 'Nuevas oportunidades, crecimiento, potencial.', 'descripcion_reves' => 'Oportunidades perdidas, falta de energía, bloqueos creativos.', 'imagen_url' => 'as_de_bastos.png'],
                ['nombre_carta' => 'Dos de Bastos', 'descripcion_derecho' => 'Planificación, decisiones, progreso.', 'descripcion_reves' => 'Falta de planificación, indecisión, miedo a lo desconocido.', 'imagen_url' => 'dos_de_bastos.png'],
                ['nombre_carta' => 'Tres de Bastos', 'descripcion_derecho' => 'Expansión, previsión, crecimiento.', 'descripcion_reves' => 'Retrasos, falta de planificación, obstáculos.', 'imagen_url' => 'tres_de_bastos.png'],
                ['nombre_carta' => 'Cuatro de Bastos', 'descripcion_derecho' => 'Celebración, armonía, hogar.', 'descripcion_reves' => 'Conflictos familiares, falta de armonía, inestabilidad.', 'imagen_url' => 'cuatro_de_bastos.png'],
                ['nombre_carta' => 'Cinco de Bastos', 'descripcion_derecho' => 'Conflicto, competencia, desacuerdos.', 'descripcion_reves' => 'Evitación del conflicto, resolución de desacuerdos, armonía.', 'imagen_url' => 'cinco_de_bastos.png'],
                ['nombre_carta' => 'Seis de Bastos', 'descripcion_derecho' => 'Éxito, reconocimiento, triunfo.', 'descripcion_reves' => 'Egotismo, falta de reconocimiento, retrasos en el éxito.', 'imagen_url' => 'seis_de_bastos.png'],
                ['nombre_carta' => 'Siete de Bastos', 'descripcion_derecho' => 'Desafíos, defensa, perseverancia.', 'descripcion_reves' => 'Rendición, fatiga, falta de resistencia.', 'imagen_url' => 'siete_de_bastos.png'],
                ['nombre_carta' => 'Ocho de Bastos', 'descripcion_derecho' => 'Movimiento rápido, acción, cambio.', 'descripcion_reves' => 'Retrasos, falta de movimiento, estancamiento.', 'imagen_url' => 'ocho_de_bastos.png'],
                ['nombre_carta' => 'Nueve de Bastos', 'descripcion_derecho' => 'Resiliencia, perseverancia, última lucha.', 'descripcion_reves' => 'Agotamiento, paranoia, falta de motivación.', 'imagen_url' => 'nueve_de_bastos.png'],
                ['nombre_carta' => 'Diez de Bastos', 'descripcion_derecho' => 'Responsabilidad, carga, estrés.', 'descripcion_reves' => 'Liberación de cargas, delegación, exceso de responsabilidades.', 'imagen_url' => 'diez_de_bastos.png'],
                ['nombre_carta' => 'Paje de Bastos', 'descripcion_derecho' => 'Creatividad, entusiasmo, nuevas ideas.', 'descripcion_reves' => 'Falta de dirección, inmadurez, mensajes de malas noticias.', 'imagen_url' => 'paje_de_bastos.png'],
                ['nombre_carta' => 'Caballero de Bastos', 'descripcion_derecho' => 'Energía, pasión, aventura.', 'descripcion_reves' => 'Impulsividad, falta de dirección, arrogancia.', 'imagen_url' => 'caballero_de_bastos.png'],
                ['nombre_carta' => 'Reina de Bastos', 'descripcion_derecho' => 'Confianza, determinación, carisma.', 'descripcion_reves' => 'Inseguridad, celos, egoísmo.', 'imagen_url' => 'reina_de_bastos.png'],
                ['nombre_carta' => 'Rey de Bastos', 'descripcion_derecho' => 'Liderazgo, visión, honor.', 'descripcion_reves' => 'Tiranía, falta de dirección, agresividad.', 'imagen_url' => 'rey_de_bastos.png'],
            ];

            foreach ($cartas as $cartaData) {
                Carta::updateOrCreate([
                    'nombre_carta' => $cartaData['nombre_carta'],
                ], [
                    'descripcion_derecho' => $cartaData['descripcion_derecho'],
                    'descripcion_reves' => $cartaData['descripcion_reves'],
                    'imagen_url' => $cartaData['imagen_url'],
                    'disenio_id' => $disenio->id,
                    'user_id' => $adminUser->id,
                ]);
            }
        });
    }

    public function down()
    {
    }
}
