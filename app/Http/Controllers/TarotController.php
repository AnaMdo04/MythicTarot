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

        // Asignar posición y orientación
        foreach ($cartas as $index => $carta) {
            $carta->posicion = $index + 1;
            $carta->al_reves = rand(0, 1) == 1; // 50% de probabilidad de estar al revés
        }

        $lectura = Lectura::create([
            'fecha_lectura' => now(),
            'pregunta' => $pregunta,
            'user_id' => $user->id,
        ]);

        $lectura->cartas()->attach($cartas->pluck('id')->toArray());

        return view('tarot.resultado', compact('lectura', 'cartas', 'pregunta', 'tipoTirada'));
    }

    private function getNumeroCartasPorTirada($tipoTirada)
    {
        switch ($tipoTirada) {
            case 'simple':
                return 3;
            case 'cruz':
                return 5;
            case 'celtica':
                return 10;
            default:
                return 3;
        }
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

        return view('tarot.resultado', compact('lectura', 'cartas', 'pregunta'));
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
