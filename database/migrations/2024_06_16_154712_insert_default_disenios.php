<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Artista;
use App\Models\Disenio;
use App\Models\DisenioImagen;

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
                    'imagen_urls' => ['tarot_gatos1.png', 'tarot_gatos2.png', 'tarot_gatos3.png'],
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot Clásico',
                    'descripcion' => 'Un diseño clásico con un toque contemporáneo.',
                    'precio' => 15.50,
                    'imagen_urls' => ['tarot_clasico1.png', 'tarot_clasico2.png'],
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot Místico',
                    'descripcion' => 'Diseños místicos y esotéricos para conectar con lo desconocido.',
                    'precio' => 22.00,
                    'imagen_urls' => ['tarot_mistico1.png', 'tarot_mistico2.png'],
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot del Bosque',
                    'descripcion' => 'Motivos de la naturaleza y el bosque en cada carta.',
                    'precio' => 28.00,
                    'imagen_urls' => ['tarot_bosque1.png', 'tarot_bosque2.png'],
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot Futurista',
                    'descripcion' => 'Un diseño futurista con ilustraciones modernas y abstractas.',
                    'precio' => 35.75,
                    'imagen_urls' => ['tarot_futurista1.webp', 'tarot_futurista2.webp'],
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Luz',
                    'descripcion' => 'Ilustraciones brillantes y llenas de energía positiva.',
                    'precio' => 40.00,
                    'imagen_urls' => ['tarot_luz1.jpg', 'tarot_luz2.jpg'],
                    'artista_nombre' => 'Sofía Fernández'
                ],
                [
                    'nombre_disenio' => 'Tarot Supernatural',
                    'descripcion' => 'Un diseño basado en la serie de televisión Supernatural.',
                    'precio' => 25.00,
                    'imagen_urls' => ['tarot_supernatural1.png', 'tarot_supernatural2.png'],
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot de Taylor Swift',
                    'descripcion' => 'Diseños inspirados en la carrera y canciones de Taylor Swift.',
                    'precio' => 30.00,
                    'imagen_urls' => ['tarot_taylor1.png', 'tarot_taylor2.png', 'tarot_taylor3.png'],
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot de Dragones',
                    'descripcion' => 'Ilustraciones impresionantes de dragones y criaturas míticas.',
                    'precio' => 28.00,
                    'imagen_urls' => ['tarot_dragones1.webp', 'tarot_dragones2.webp'],
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot del Zodiaco',
                    'descripcion' => 'Un diseño basado en los signos del zodiaco.',
                    'precio' => 32.00,
                    'imagen_urls' => ['tarot_zodiaco1.png', 'tarot_zodiaco2.png'],
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Naturaleza',
                    'descripcion' => 'Motivos naturales que reflejan la belleza del mundo.',
                    'precio' => 29.50,
                    'imagen_urls' => ['tarot_naturaleza1.png', 'tarot_naturaleza2.png'],
                    'artista_nombre' => 'Sofía Fernández'
                ],
                [
                    'nombre_disenio' => 'Tarot del Océano',
                    'descripcion' => 'Diseños marinos que evocan la serenidad del océano.',
                    'precio' => 27.00,
                    'imagen_urls' => ['tarot_oceano1.webp', 'tarot_oceano2.png'],
                    'artista_nombre' => 'Carlos Rivera'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Fantasía',
                    'descripcion' => 'Ilustraciones de mundos y criaturas de fantasía.',
                    'precio' => 34.00,
                    'imagen_urls' => ['tarot_fantasia1.webp', 'tarot_fantasia2.webp'],
                    'artista_nombre' => 'Ana López'
                ],
                [
                    'nombre_disenio' => 'Tarot Vintage',
                    'descripcion' => 'Un diseño retro que recuerda a las antiguas cartas de tarot.',
                    'precio' => 23.00,
                    'imagen_urls' => ['tarot_vintage1.png', 'tarot_vintage2.png'],
                    'artista_nombre' => 'María González'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Magia',
                    'descripcion' => 'Diseños mágicos y místicos que inspiran la imaginación.',
                    'precio' => 31.00,
                    'imagen_urls' => ['tarot_magia1.png', 'tarot_magia2.png', 'tarot_magia3.png'],
                    'artista_nombre' => 'Luis Martínez'
                ],
                [
                    'nombre_disenio' => 'Tarot de la Luna',
                    'descripcion' => 'Ilustraciones que capturan la mística y belleza de la luna.',
                    'precio' => 26.00,
                    'imagen_urls' => ['tarot_luna1.webp', 'tarot_luna2.webp', 'tarot_luna3.webp', 'tarot_luna4.webp', 'tarot_luna5.webp', 'tarot_luna6.webp'],
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
                        $disenio = Disenio::firstOrCreate([
                            'nombre_disenio' => $disenioData['nombre_disenio'],
                        ], [
                            'descripcion' => $disenioData['descripcion'],
                            'precio' => $disenioData['precio'],
                            'artista_id' => $artista->id,
                        ]);

                        foreach ($disenioData['imagen_urls'] as $imagen_url) {
                            DisenioImagen::create([
                                'disenio_id' => $disenio->id,
                                'imagen_url' => $imagen_url,
                            ]);
                        }
                    }
                }
            }
        });
    }

    public function down()
    {
    }
}
