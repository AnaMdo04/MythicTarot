<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Disenio;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Disenio::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('nombre_disenio', 'like', '%' . $search . '%');
        }

        $disenios = $query->simplePaginate(9);

        return view('tienda.index', compact('disenios'));
    }

    public function show($id)
    {
        $disenio = Disenio::findOrFail($id);
        return view('tienda.show', compact('disenio'));
    }

    public function addToCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('intended_url', url()->current());
        }

        $disenio = Disenio::findOrFail($id);
        $user = Auth::user();

        $alreadyPurchased = Compra::where('user_id', $user->id)->whereHas('disenios', function ($query) use ($id) {
            $query->where('disenio_id', $id);
        })->exists();

        if ($alreadyPurchased) {
            return redirect()->route('tienda.index')->with('error', 'Ya has comprado este diseño.');
        }

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $cartItem = $cart->items()->where('disenio_id', $disenio->id)->first();
        if ($cartItem) {
            return redirect()->route('cart.index')->with('error', 'Este diseño ya está en tu carrito.');
        }

        CartItem::create([
            'cart_id' => $cart->id,
            'disenio_id' => $disenio->id,
            'cantidad' => 1
        ]);

        return redirect()->route('cart.index')->with('success', 'Producto añadido al carrito.');
    }
}
