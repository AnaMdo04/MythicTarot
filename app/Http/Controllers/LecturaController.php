<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lectura;
use App\Models\Comentario;

class LecturaController extends Controller
{
    public function index()
    {
        $lecturas = Lectura::where('user_id', Auth::id())->get();
        return view('lecturas', compact('lecturas'));
    }

    public function show($id)
    {
        $lectura = Lectura::with('cartas', 'comentarios')->findOrFail($id);
        return view('lectura.show', compact('lectura'));
    }

    public function update(Request $request, $id)
    {
        $lectura = Lectura::findOrFail($id);
        $this->authorize('update', $lectura);

        $request->validate([
            'comentario' => 'required|string',
        ]);

        $comentario = Comentario::where('lectura_id', $lectura->id)->first();
        if ($comentario) {
            $comentario->texto = $request->input('comentario');
            $comentario->save();
        } else {
            Comentario::create([
                'texto' => $request->input('comentario'),
                'fecha_comentario' => now(),
                'lectura_id' => $lectura->id,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->route('lectura.show', $lectura->id)->with('success', 'Comentario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $lectura = Lectura::findOrFail($id);
        $this->authorize('delete', $lectura);

        // Eliminar comentarios asociados
        Comentario::where('lectura_id', $lectura->id)->delete();

        // Eliminar la lectura
        $lectura->delete();

        return redirect()->route('lecturas')->with('success', 'Lectura eliminada correctamente.');
    }
}
