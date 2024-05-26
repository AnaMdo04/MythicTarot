<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Carta;

class CartaController extends Controller
{
    public function index()
    {
        $cartas = Carta::where('user_id', Auth::id())->get();
        return view('cartas', compact('cartas'));
    }

    public function edit($id)
    {
        $carta = Carta::findOrFail($id);
        return view('carta.edit', compact('carta'));
    }

    public function update(Request $request, $id)
    {
        $carta = Carta::findOrFail($id);
        $this->authorize('update', $carta);

        $request->validate([
            'nombre_carta' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen_url')) {
            if ($carta->imagen_url) {
                Storage::delete('public/' . $carta->imagen_url);
            }
            $path = $request->file('imagen_url')->store('cartas', 'public');
            $carta->imagen_url = $path;
        }

        $carta->nombre_carta = $request->input('nombre_carta');
        $carta->descripcion = $request->input('descripcion');
        $carta->save();

        return redirect()->route('cartas')->with('success', 'Carta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $carta = Carta::findOrFail($id);
        $this->authorize('delete', $carta);

        if ($carta->imagen_url) {
            Storage::delete('public/' . $carta->imagen_url);
        }

        $carta->delete();

        return redirect()->route('cartas')->with('success', 'Carta eliminada correctamente.');
    }
}
