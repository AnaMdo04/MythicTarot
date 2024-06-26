<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lectura;
use App\Models\Comentario;
use App\Models\Carta;

class LecturaController extends Controller
{
    public function index(Request $request)
    {
        $query = Lectura::with(['cartas', 'comentarios'])->where('user_id', Auth::id());

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('pregunta', 'like', '%' . $search . '%')
                    ->orWhereHas('comentarios', function ($q) use ($search) {
                        $q->where('texto', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('cartas', function ($q) use ($search) {
                        $q->where('nombre_carta', 'like', '%' . $search . '%');
                    });
            });
        }

        $lecturas = $query->simplePaginate(10);

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

        Comentario::where('lectura_id', $lectura->id)->delete();

        $lectura->delete();

        return redirect()->route('lecturas')->with('success', 'Lectura eliminada correctamente.');
    }
}
