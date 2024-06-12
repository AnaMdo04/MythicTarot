<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Disenio;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.disenio')->first();
        return view('cart.index', compact('cart'));
    }

    public function addItem(Request $request, $id)
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $item = $cart->items()->where('disenio_id', $id)->first();
        if ($item) {
            return redirect()->route('cart.index')->with('error', 'Este diseño ya está en tu carrito.');
        }

        $cart->items()->create(['disenio_id' => $id, 'cantidad' => 1]);

        return redirect()->route('cart.index')->with('success', 'Artículo añadido al carrito.');
    }

    public function removeItem($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return redirect()->route('cart.index')->with('success', 'Artículo eliminado del carrito.');
    }
}
