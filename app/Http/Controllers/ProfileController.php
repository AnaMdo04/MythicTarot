<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('perfil');
    }

    public function edit()
    {
        return view('ajustes');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            Log::info('Intentando actualizar el perfil del usuario con ID: ' . $user->id);

            if ($request->hasFile('profile_image')) {
                Log::info('Subiendo nueva imagen de perfil');
                if ($user->profile_image) {
                    Log::info('Eliminando imagen de perfil anterior: ' . $user->profile_image);
                    Storage::delete('public/' . $user->profile_image);
                }
                $path = $request->file('profile_image')->store('profile_images', 'public');
                $user->profile_image = $path;
            }

            $user->name = $request->input('name');
            if ($request->filled('password')) {
                Log::info('Actualizando contraseña del usuario');
                $user->password = Hash::make($request->input('password'));
            }

            Log::info('Guardando los cambios del perfil');
            $user->save();

            Log::info('Perfil actualizado correctamente');
            return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error actualizando el perfil: ' . $e->getMessage());
            return redirect()->route('perfil')->with('error', 'Error actualizando el perfil.');
        }
    }
}
