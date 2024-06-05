<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Carta;
use App\Models\Disenio;

class CartaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartas = $user->Carta::cartas()->withPivot('disenio_id')->get();
        foreach ($cartas as $carta) {
            $disenioId = $carta->pivot->disenio_id;
            $disenio = Disenio::find($disenioId);
            $carta->imagen_url = $disenio->imagen_url;
        }

        return view('mis-disenios', compact('cartas'));
    }

    public function edit($cartaId)
    {
        $user = Auth::user();
        $carta = $user->Carta::cartas()->where('carta_id', $cartaId)->firstOrFail();
        $disenios = Disenio::all();
        return view('carta.edit', compact('carta', 'disenios'));
    }

    public function update(Request $request, $cartaId)
    {
        $user = Auth::user();
        $carta = $user->Carta::cartas()->where('carta_id', $cartaId)->firstOrFail();

        $request->validate([
            'nombre_carta' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'disenio_id' => 'required|exists:disenios,id',
        ]);

        if ($request->hasFile('imagen_url')) {
            if ($carta->pivot->imagen_url) {
                Storage::delete('public/' . $carta->pivot->imagen_url);
            }
            $path = $request->file('imagen_url')->store('cartas', 'public');
            $carta->pivot->imagen_url = $path;
        }

        $carta->pivot->disenio_id = $request->input('disenio_id');
        $carta->pivot->save();

        $carta->nombre_carta = $request->input('nombre_carta');
        $carta->descripcion = $request->input('descripcion');
        $carta->save();

        return redirect()->route('mis-disenios')->with('success', 'Carta actualizada correctamente.');
    }

    public function destroy($cartaId)
    {
        $user = Auth::user();
        $carta = $user->Carta::cartas()->where('carta_id', $cartaId)->firstOrFail();

        if ($carta->pivot->imagen_url) {
            Storage::delete('public/' . $carta->pivot->imagen_url);
        }

        $carta->pivot->delete();

        return redirect()->route('mis-disenios')->with('success', 'Carta eliminada correctamente.');
    }
}
