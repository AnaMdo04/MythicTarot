<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Artista;
use App\Models\Disenio;
use App\Models\Carta;

class InsertDefaultCartas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            // Crear un usuario administrador predeterminado si no existe
            $adminUser = User::firstOrCreate([
                'email' => 'admin@mythictarot.com',
            ], [
                'name' => 'Admin User',
                'password' => bcrypt('adminpassword'), // Cambia esto por una contraseña segura
                'is_artist' => true,
            ]);

            // Crear un artista predeterminado si no existe
            $artista = Artista::firstOrCreate([
                'nombre_artista' => 'Artista Predeterminado',
                'user_id' => $adminUser->id, // Asignar el ID del usuario administrador
            ], [
                'biografia' => 'Biografía del Artista Predeterminado',
            ]);

            // Crear un diseño predeterminado si no existe
            $disenio = Disenio::firstOrCreate([
                'nombre_disenio' => 'Diseño Predeterminado',
                'artista_id' => $artista->id,
            ], [
                'precio' => 0,
                'imagen_url' => 'default.jpg',
            ]);

            // Definir las cartas predeterminadas
            $cartas = [
                ['nombre_carta' => 'El Loco', 'descripcion' => 'Nuevos comienzos, espontaneidad, libertad.', 'imagen_url' => 'el_loco.png'],
                ['nombre_carta' => 'El Mago', 'descripcion' => 'Manifestación, poder, creatividad.', 'imagen_url' => 'el_mago.png'],
                ['nombre_carta' => 'La Suma Sacerdotisa', 'descripcion' => 'Intuición, sabiduría, conocimiento oculto.', 'imagen_url' => 'la_suma_sacerdotista.png'],
                ['nombre_carta' => 'La Emperatriz', 'descripcion' => 'Fertilidad, abundancia, naturaleza.', 'imagen_url' => 'la_emperatriz.png'],
                ['nombre_carta' => 'El Emperador', 'descripcion' => 'Autoridad, estructura, control.', 'imagen_url' => 'el_emperador.png'],
                ['nombre_carta' => 'El Sumo Sacerdote', 'descripcion' => 'Tradición, conformidad, moralidad.', 'imagen_url' => 'el_hierofante.png'],
                ['nombre_carta' => 'Los Enamorados', 'descripcion' => 'Amor, armonía, relaciones.', 'imagen_url' => 'los_enamorados.png'],
                ['nombre_carta' => 'El Carro', 'descripcion' => 'Voluntad, éxito, determinación.', 'imagen_url' => 'el_carro.png'],
                ['nombre_carta' => 'La Justicia', 'descripcion' => 'Justicia, verdad, equidad.', 'imagen_url' => 'la_justicia.png'],
                ['nombre_carta' => 'El Ermitaño', 'descripcion' => 'Introspección, búsqueda de la verdad, soledad.', 'imagen_url' => 'el_ermitano.png'],
                ['nombre_carta' => 'La Rueda de la Fortuna', 'descripcion' => 'Cambio, ciclos, destino.', 'imagen_url' => 'la_rueda.png'],
                ['nombre_carta' => 'La Fuerza', 'descripcion' => 'Fuerza interior, coraje, compasión.', 'imagen_url' => 'la_fuerza.png'],
                ['nombre_carta' => 'El Colgado', 'descripcion' => 'Sacrificio, entrega, nuevas perspectivas.', 'imagen_url' => 'el_colgado.png'],
                ['nombre_carta' => 'La Muerte', 'descripcion' => 'Transformación, cambio, final.', 'imagen_url' => 'la_muerte.png'],
                ['nombre_carta' => 'La Templanza', 'descripcion' => 'Equilibrio, moderación, paciencia.', 'imagen_url' => 'la_templanza.png'],
                ['nombre_carta' => 'El Diablo', 'descripcion' => 'Tentación, materialismo, ataduras.', 'imagen_url' => 'el_diablo.png'],
                ['nombre_carta' => 'La Torre', 'descripcion' => 'Destrucción, cambio repentino, crisis.', 'imagen_url' => 'la_torre.png'],
                ['nombre_carta' => 'La Estrella', 'descripcion' => 'Esperanza, inspiración, serenidad.', 'imagen_url' => 'la_estrella.png'],
                ['nombre_carta' => 'La Luna', 'descripcion' => 'Ilusión, miedo, inconsciente.', 'imagen_url' => 'la_luna.png'],
                ['nombre_carta' => 'El Sol', 'descripcion' => 'Éxito, vitalidad, alegría.', 'imagen_url' => 'el_sol.png'],
                ['nombre_carta' => 'El Juicio', 'descripcion' => 'Juicio, renacimiento, absolución.', 'imagen_url' => 'el_juicio.png'],
                ['nombre_carta' => 'El Mundo', 'descripcion' => 'Finalización, logro, perfección.', 'imagen_url' => 'el_mundo.png'],
                // Arcanos Menores - Copas
                ['nombre_carta' => 'As de Copas', 'descripcion' => 'Nuevas relaciones, amor, creatividad.', 'imagen_url' => 'as_de_copas.png'],
                ['nombre_carta' => 'Dos de Copas', 'descripcion' => 'Unión, amor, sociedad.', 'imagen_url' => 'dos_de_copas.png'],
                ['nombre_carta' => 'Tres de Copas', 'descripcion' => 'Celebración, amistad, creatividad en grupo.', 'imagen_url' => 'tres_de_copas.png'],
                ['nombre_carta' => 'Cuatro de Copas', 'descripcion' => 'Contemplación, reevaluación, aburrimiento.', 'imagen_url' => 'cuatro_de_copas.png'],
                ['nombre_carta' => 'Cinco de Copas', 'descripcion' => 'Pérdida, arrepentimiento, tristeza.', 'imagen_url' => 'cinco_de_copas.png'],
                ['nombre_carta' => 'Seis de Copas', 'descripcion' => 'Nostalgia, recuerdos, infancia.', 'imagen_url' => 'seis_de_copas.png'],
                ['nombre_carta' => 'Siete de Copas', 'descripcion' => 'Opciones, ilusiones, decisiones.', 'imagen_url' => 'siete_de_copas.png'],
                ['nombre_carta' => 'Ocho de Copas', 'descripcion' => 'Abandono, búsqueda, cambio de dirección.', 'imagen_url' => 'ocho_de_copas.png'],
                ['nombre_carta' => 'Nueve de Copas', 'descripcion' => 'Satisfacción, realización, gratitud.', 'imagen_url' => 'nueve_de_copas.png'],
                ['nombre_carta' => 'Diez de Copas', 'descripcion' => 'Felicidad, armonía, realización emocional.', 'imagen_url' => 'diez_de_copas.png'],
                ['nombre_carta' => 'Sota de Copas', 'descripcion' => 'Creatividad, intuición, mensajes emocionales.', 'imagen_url' => 'paje_de_copas.png'],
                ['nombre_carta' => 'Caballero de Copas', 'descripcion' => 'Romance, encanto, propuestas.', 'imagen_url' => 'caballero_de_copas.png'],
                ['nombre_carta' => 'Reina de Copas', 'descripcion' => 'Intuición, compasión, cuidado.', 'imagen_url' => 'reina_de_copas.png'],
                ['nombre_carta' => 'Rey de Copas', 'descripcion' => 'Control emocional, balance, generosidad.', 'imagen_url' => 'rey_de_copas.png'],
                // Arcanos Menores - Oros
                ['nombre_carta' => 'As de Oros', 'descripcion' => 'Nuevas oportunidades, prosperidad, abundancia.', 'imagen_url' => 'as_de_oros.png'],
                ['nombre_carta' => 'Dos de Oros', 'descripcion' => 'Balance, adaptabilidad, tiempo de administración.', 'imagen_url' => 'dos_de_oros.png'],
                ['nombre_carta' => 'Tres de Oros', 'descripcion' => 'Trabajo en equipo, colaboración, aprendizaje.', 'imagen_url' => 'tres_de_oros.png'],
                ['nombre_carta' => 'Cuatro de Oros', 'descripcion' => 'Seguridad, conservación, control.', 'imagen_url' => 'cuatro_de_oros.png'],
                ['nombre_carta' => 'Cinco de Oros', 'descripcion' => 'Pérdida, pobreza, dificultades.', 'imagen_url' => 'cinco_de_oros.png'],
                ['nombre_carta' => 'Seis de Oros', 'descripcion' => 'Generosidad, caridad, compartir.', 'imagen_url' => 'seis_de_oros.png'],
                ['nombre_carta' => 'Siete de Oros', 'descripcion' => 'Reevaluación, paciencia, inversión.', 'imagen_url' => 'siete_de_oros.png'],
                ['nombre_carta' => 'Ocho de Oros', 'descripcion' => 'Trabajo duro, habilidad, dedicación.', 'imagen_url' => 'ocho_de_oros.png'],
                ['nombre_carta' => 'Nueve de Oros', 'descripcion' => 'Abundancia, lujo, autosuficiencia.', 'imagen_url' => 'nueve_de_oros.png'],
                ['nombre_carta' => 'Diez de Oros', 'descripcion' => 'Herencia, familia, riqueza.', 'imagen_url' => 'diez_de_oros.png'],
                ['nombre_carta' => 'Sota de Oros', 'descripcion' => 'Nuevas oportunidades, desarrollo, manifestación.', 'imagen_url' => 'paje_de_oros.png'],
                ['nombre_carta' => 'Caballero de Oros', 'descripcion' => 'Trabajo duro, responsabilidad, eficiencia.', 'imagen_url' => 'caballero_de_oros.png'],
                ['nombre_carta' => 'Reina de Oros', 'descripcion' => 'Practicidad, seguridad, maternidad.', 'imagen_url' => 'reina_de_oros.png'],
                ['nombre_carta' => 'Rey de Oros', 'descripcion' => 'Abundancia, seguridad, liderazgo.', 'imagen_url' => 'rey_de_oros.png'],
                // Arcanos Menores - Espadas
                ['nombre_carta' => 'As de Espadas', 'descripcion' => 'Claridad, verdad, nuevas ideas.', 'imagen_url' => 'as_de_espadas.png'],
                ['nombre_carta' => 'Dos de Espadas', 'descripcion' => 'Indecisión, bloqueo, compromiso.', 'imagen_url' => 'dos_de_espadas.png'],
                ['nombre_carta' => 'Tres de Espadas', 'descripcion' => 'Dolor, traición, tristeza.', 'imagen_url' => 'tres_de_espadas.png'],
                ['nombre_carta' => 'Cuatro de Espadas', 'descripcion' => 'Descanso, recuperación, reflexión.', 'imagen_url' => 'cuatro_de_espadas.png'],
                ['nombre_carta' => 'Cinco de Espadas', 'descripcion' => 'Conflicto, derrota, desacuerdo.', 'imagen_url' => 'cinco_de_espadas.png'],
                ['nombre_carta' => 'Seis de Espadas', 'descripcion' => 'Transición, cambio, movimiento.', 'imagen_url' => 'seis_de_espadas.png'],
                ['nombre_carta' => 'Siete de Espadas', 'descripcion' => 'Engaño, traición, estrategia.', 'imagen_url' => 'siete_de_espadas.png'],
                ['nombre_carta' => 'Ocho de Espadas', 'descripcion' => 'Restricciones, limitaciones, sentirse atrapado.', 'imagen_url' => 'ocho_de_espadas.png'],
                ['nombre_carta' => 'Nueve de Espadas', 'descripcion' => 'Ansiedad, miedo, pesadillas.', 'imagen_url' => 'nueve_de_espadas.png'],
                ['nombre_carta' => 'Diez de Espadas', 'descripcion' => 'Final doloroso, traición, derrota.', 'imagen_url' => 'diez_de_espadas.png'],
                ['nombre_carta' => 'Sota de Espadas', 'descripcion' => 'Curiosidad, verdad, nuevas ideas.', 'imagen_url' => 'paje_de_espadas.png'],
                ['nombre_carta' => 'Caballero de Espadas', 'descripcion' => 'Acción, impulso, lucha por la justicia.', 'imagen_url' => 'caballero_de_espadas.png'],
                ['nombre_carta' => 'Reina de Espadas', 'descripcion' => 'Verdad, independencia, percepción clara.', 'imagen_url' => 'reina_de_espadas.png'],
                ['nombre_carta' => 'Rey de Espadas', 'descripcion' => 'Intelecto, verdad, autoridad.', 'imagen_url' => 'rey_de_espadas.png'],
                // Arcanos Menores - Bastos
                ['nombre_carta' => 'As de Bastos', 'descripcion' => 'Nuevas oportunidades, crecimiento, potencial.', 'imagen_url' => 'as_de_bastos.png'],
                ['nombre_carta' => 'Dos de Bastos', 'descripcion' => 'Planificación, decisiones, progreso.', 'imagen_url' => 'dos_de_bastos.png'],
                ['nombre_carta' => 'Tres de Bastos', 'descripcion' => 'Expansión, previsión, crecimiento.', 'imagen_url' => 'tres_de_bastos.png'],
                ['nombre_carta' => 'Cuatro de Bastos', 'descripcion' => 'Celebración, armonía, hogar.', 'imagen_url' => 'cuatro_de_bastos.png'],
                ['nombre_carta' => 'Cinco de Bastos', 'descripcion' => 'Conflicto, competencia, desacuerdos.', 'imagen_url' => 'cinco_de_bastos.png'],
                ['nombre_carta' => 'Seis de Bastos', 'descripcion' => 'Éxito, reconocimiento, triunfo.', 'imagen_url' => 'seis_de_bastos.png'],
                ['nombre_carta' => 'Siete de Bastos', 'descripcion' => 'Desafíos, defensa, perseverancia.', 'imagen_url' => 'siete_de_bastos.png'],
                ['nombre_carta' => 'Ocho de Bastos', 'descripcion' => 'Movimiento rápido, acción, cambio.', 'imagen_url' => 'ocho_de_bastos.png'],
                ['nombre_carta' => 'Nueve de Bastos', 'descripcion' => 'Resiliencia, perseverancia, última lucha.', 'imagen_url' => 'nueve_de_bastos.png'],
                ['nombre_carta' => 'Diez de Bastos', 'descripcion' => 'Responsabilidad, carga, estrés.', 'imagen_url' => 'diez_de_bastos.png'],
                ['nombre_carta' => 'Sota de Bastos', 'descripcion' => 'Creatividad, entusiasmo, nuevas ideas.', 'imagen_url' => 'paje_de_bastos.png'],
                ['nombre_carta' => 'Caballero de Bastos', 'descripcion' => 'Energía, pasión, aventura.', 'imagen_url' => 'caballero_de_bastos.png'],
                ['nombre_carta' => 'Reina de Bastos', 'descripcion' => 'Confianza, determinación, carisma.', 'imagen_url' => 'reina_de_bastos.png'],
                ['nombre_carta' => 'Rey de Bastos', 'descripcion' => 'Liderazgo, visión, honor.', 'imagen_url' => 'rey_de_bastos.png'],
            ];

            // Insertar las cartas predeterminadas
            foreach ($cartas as $cartaData) {
                Carta::firstOrCreate([
                    'nombre_carta' => $cartaData['nombre_carta'],
                ], [
                    'descripcion' => $cartaData['descripcion'],
                    'imagen_url' => $cartaData['imagen_url'], // Usar la URL de la imagen especificada
                    'disenio_id' => $disenio->id,
                    'user_id' => $adminUser->id, // Asignar el ID del usuario administrador
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No need to delete the cartas in the down method
    }
}
