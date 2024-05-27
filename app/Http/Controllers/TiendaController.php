<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Disenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    public function index()
    {
        $disenios = Disenio::paginate(9);
        return view('tienda.index', compact('disenios'));
    }

    public function show($id)
    {
        $disenio = Disenio::findOrFail($id);
        return view('tienda.show', compact('disenio'));
    }

    public function addToCart(Request $request, $id)
    {
        $disenio = Disenio::findOrFail($id);
        $user = Auth::user();

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $cartItem = CartItem::where('cart_id', $cart->id)->where('disenio_id', $disenio->id)->first();

        if ($cartItem) {
            $cartItem->cantidad += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'disenio_id' => $disenio->id,
                'cantidad' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Producto añadido al carrito.');
    }
}
