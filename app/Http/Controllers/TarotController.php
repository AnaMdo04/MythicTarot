<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lectura;
use App\Models\Carta;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class TarotController extends Controller
{
    public function index()
    {
        return view('tarot.index');
    }

    public function preguntar()
    {
        return view('tarot.preguntar');
    }

    public function seleccionarTirada(Request $request)
    {
        $request->session()->put('pregunta', $request->input('pregunta'));
        return view('tarot.seleccionar_tirada');
    }

    public function realizarTirada(Request $request)
    {
        $user = Auth::user();
        $pregunta = session('pregunta');
        $tipoTirada = $request->input('tipo_tirada');

        $numCartas = $this->getNumeroCartasPorTirada($tipoTirada);

        $cartas = Carta::inRandomOrder()->take($numCartas)->get();

        $lectura = Lectura::create([
            'fecha_lectura' => now(),
            'pregunta' => $pregunta,
            'user_id' => $user->id,
            'tipo_tirada' => $tipoTirada,
        ]);

        $cartas = $cartas->shuffle();

        foreach ($cartas as $index => $carta) {
            $lectura->cartas()->attach($carta->id, [
                'posicion' => $index + 1,
                'al_reves' => (bool)random_int(0, 1)
            ]);
        }
    
        $cartas = $lectura->cartas()->get();
        $tipoTiradaDesc = $this->getTipoTiradaDescription($tipoTirada);
    
        return view('tarot.resultado', compact('lectura', 'cartas', 'pregunta', 'tipoTiradaDesc'));
    }

    private function getNumeroCartasPorTirada($tipoTirada)
    {
        switch ($tipoTirada) {
            case 'simple':
                return 3;
            case 'cruz':
                return 5;
            case 'pentaculo':
                return 6;
            default:
                return 3;
        }
    }

    private function getTipoTiradaDescription($tipoTirada)
    {
        $descriptions = [
            'simple' => [
                'title' => 'Tirada Simple (3 cartas)',
                'description' => 'Primera carta: pasado<br>Segunda carta: presente<br>Tercera carta: futuro',
            ],
            'cruz' => [
                'title' => 'Tirada Cruz (5 cartas)',
                'description' => 'Primera carta: situación actual<br>Segunda carta: desafíos<br>Tercera carta: pasado<br>Cuarta carta: futuro<br>Quinta carta: potencial',
            ],
            'pentaculo' => [
                'title' => 'Tirada del Pentáculo (6 cartas)',
                'description' => 'Primera carta: causa<br>Segunda carta: efecto<br>Tercera carta: consecuencia<br>Cuarta carta: solución<br>Quinta carta: obstáculo<br>Sexta carta: resultado',
            ],
        ];

        return $descriptions[$tipoTirada] ?? $descriptions['simple'];
    }

    public function guardarComentario(Request $request, $lectura_id)
    {
        $user = Auth::user();
        $request->validate([
            'texto' => 'required|string',
        ]);

        Comentario::create([
            'texto' => $request->input('texto'),
            'fecha_comentario' => now(),
            'lectura_id' => $lectura_id,
            'user_id' => $user->id,
        ]);

        return back()->with('success', 'Comentario guardado correctamente.');
    }

    public function resultado($id)
    {
        $lectura = Lectura::with('cartas', 'comentarios.user')->findOrFail($id);
        $cartas = $lectura->cartas;
        $pregunta = $lectura->pregunta;
        $tipoTiradaDesc = $this->getTipoTiradaDescription($lectura->tipo_tirada);

        return view('tarot.resultado', compact('lectura', 'cartas', 'pregunta', 'tipoTiradaDesc'));
    }

    public function updateComentario(Request $request, $comentario_id)
    {
        $comentario = Comentario::findOrFail($comentario_id);
        $this->authorize('update', $comentario);

        $request->validate([
            'texto' => 'required|string',
        ]);

        $comentario->texto = $request->input('texto');
        $comentario->save();

        return back()->with('success', 'Comentario actualizado correctamente.');
    }
}
