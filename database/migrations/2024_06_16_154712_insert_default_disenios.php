<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Artista;
use App\Models\Disenio;

class InsertDefaultDisenios extends Migration
{
    public function up()
    {
        DB::transaction(function () {
            $artistas = [
                ['nombre_artista' => 'Ana López', 'biografia' => 'Ana López es una artista reconocida por su estilo único y moderno.'],
                ['nombre_artista' => 'Carlos Rivera', 'biografia' => 'Carlos Rivera, conocido por sus vibrantes y coloridos diseños.'],
                ['nombre_artista' => 'María González', 'biografia' => 'María González combina técnicas tradicionales con un enfoque contemporáneo.'],
                ['nombre_artista' => 'Luis Martínez', 'biografia' => 'Luis Martínez es famoso por sus diseños minimalistas y elegantes.'],
                ['nombre_artista' => 'Sofía Fernández', 'biografia' => 'Sofía Fernández crea diseños audaces y llamativos para destacar en cualquier ocasión.'],
            ];

            $disenios = [
                [
                    'nombre_disenio' => 'Tarot de Gatos',
                    'descripcion' => 'Un diseño encantador con ilustraciones de gatos en cada carta.',
                    'precio' => 12.00,
                    'imagen_url' => 'tarot_gatos.jpg',
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot Estelar',
                    'descripcion' => 'Diseños cósmicos y celestiales para explorar el universo.',
                    'precio' => 18.50,
                    'imagen_url' => 'tarot_estelar.jpg',
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot Medieval',
                    'descripcion' => 'Un diseño que evoca la época medieval con detalles intrincados.',
                    'precio' => 20.00,
                    'imagen_url' => 'tarot_medieval.jpg',
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot Floral',
                    'descripcion' => 'Hermosos motivos florales que añaden un toque de naturaleza.',
                    'precio' => 25.75,
                    'imagen_url' => 'tarot_floral.jpg',
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de los Sueños',
                    'descripcion' => 'Diseños etéreos y oníricos que invitan a la reflexión y al sueño.',
                    'precio' => 30.00,
                    'imagen_url' => 'tarot_suenos.jpg',
                    'artista_nombre' => 'Sofía Fernández'
                ],
                [
                    'nombre_disenio' => 'Tarot Clásico',
                    'descripcion' => 'Un diseño clásico con un toque contemporáneo.',
                    'precio' => 15.50,
                    'imagen_url' => 'tarot_clasico.jpg',
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot Místico',
                    'descripcion' => 'Diseños místicos y esotéricos para conectar con lo desconocido.',
                    'precio' => 22.00,
                    'imagen_url' => 'tarot_mistico.jpg',
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot del Bosque',
                    'descripcion' => 'Motivos de la naturaleza y el bosque en cada carta.',
                    'precio' => 28.00,
                    'imagen_url' => 'tarot_bosque.jpg',
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot Futurista',
                    'descripcion' => 'Un diseño futurista con ilustraciones modernas y abstractas.',
                    'precio' => 35.75,
                    'imagen_url' => 'tarot_futurista.jpg',
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Luz',
                    'descripcion' => 'Ilustraciones brillantes y llenas de energía positiva.',
                    'precio' => 40.00,
                    'imagen_url' => 'tarot_luz.jpg',
                    'artista_nombre' => 'Sofía Fernández'
                ],
                [
                    'nombre_disenio' => 'Tarot Supernatural',
                    'descripcion' => 'Un diseño basado en la serie de televisión Supernatural.',
                    'precio' => 25.00,
                    'imagen_url' => 'tarot_supernatural.jpg',
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot de Taylor Swift',
                    'descripcion' => 'Diseños inspirados en la carrera y canciones de Taylor Swift.',
                    'precio' => 30.00,
                    'imagen_url' => 'tarot_taylor_swift.jpg',
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot de Dragones',
                    'descripcion' => 'Ilustraciones impresionantes de dragones y criaturas míticas.',
                    'precio' => 28.00,
                    'imagen_url' => 'tarot_dragones.jpg',
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot del Zodiaco',
                    'descripcion' => 'Un diseño basado en los signos del zodiaco.',
                    'precio' => 32.00,
                    'imagen_url' => 'tarot_zodiaco.jpg',
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Naturaleza',
                    'descripcion' => 'Motivos naturales que reflejan la belleza del mundo.',
                    'precio' => 29.50,
                    'imagen_url' => 'tarot_naturaleza.jpg',
                    'artista_nombre' => 'Sofía Fernández'
                ],
                [
                    'nombre_disenio' => 'Tarot del Océano',
                    'descripcion' => 'Diseños marinos que evocan la serenidad del océano.',
                    'precio' => 27.00,
                    'imagen_url' => 'tarot_oceano.jpg',
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Fantasía',
                    'descripcion' => 'Ilustraciones de mundos y criaturas de fantasía.',
                    'precio' => 34.00,
                    'imagen_url' => 'tarot_fantasia.jpg',
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot Vintage',
                    'descripcion' => 'Un diseño retro que recuerda a las antiguas cartas de tarot.',
                    'precio' => 23.00,
                    'imagen_url' => 'tarot_vintage.jpg',
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Magia',
                    'descripcion' => 'Diseños mágicos y místicos que inspiran la imaginación.',
                    'precio' => 31.00,
                    'imagen_url' => 'tarot_magia.jpg',
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Luna',
                    'descripcion' => 'Ilustraciones que capturan la mística y belleza de la luna.',
                    'precio' => 26.00,
                    'imagen_url' => 'tarot_luna.jpg',
                    'artista_nombre' => 'Sofía Fernández'
                ],
            ];

            foreach ($artistas as $artistaData) {
                $artista = Artista::firstOrCreate([
                    'nombre_artista' => $artistaData['nombre_artista']
                ], [
                    'biografia' => $artistaData['biografia'],
                ]);

                foreach ($disenios as $disenioData) {
                    if ($disenioData['artista_nombre'] === $artistaData['nombre_artista']) {
                        Disenio::firstOrCreate([
                            'nombre_disenio' => $disenioData['nombre_disenio'],
                        ], [
                            'descripcion' => $disenioData['descripcion'],
                            'precio' => $disenioData['precio'],
                            'imagen_url' => $disenioData['imagen_url'],
                            'artista_id' => $artista->id,
                        ]);
                    }
                }
            }
        });
    }

    public function down()
    {
    }
}
