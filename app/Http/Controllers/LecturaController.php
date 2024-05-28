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
        $lectura = Lectura::findOrFail($id);
        return view('lectura.show', compact('lectura'));
    }

    public function update(Request $request, $id)
    {
        $lectura = Lectura::findOrFail($id);
        $this->authorize('update', $lectura);

        $request->validate([
            'respuesta' => 'required|string',
        ]);

        $lectura->respuesta = $request->input('respuesta');
        $lectura->save();

        return redirect()->route('lectura.show', $lectura->id)->with('success', 'Lectura actualizada correctamente.');
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
