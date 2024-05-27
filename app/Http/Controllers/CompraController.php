<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Disenio;
use App\Models\Compra;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $carritoItems = $cart ? $cart->items : [];
        $total = $carritoItems->sum(function($item) {
            return $item->disenio->precio * $item->cantidad;
        });

        return view('checkout', compact('carritoItems', 'total'));
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = Auth::user();
        $cart = $user->cart;
        $carritoItems = $cart ? $cart->items : [];

        $total = $carritoItems->sum(function($item) {
            return $item->disenio->precio * $item->cantidad;
        });

        $paymentIntent = PaymentIntent::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'payment_method' => $request->payment_method,
            'confirmation_method' => 'manual',
            'confirm' => true,
            'return_url' => route('payment.callback'),
        ]);

        if ($paymentIntent->status == 'requires_action' && $paymentIntent->next_action->type == 'use_stripe_sdk') {
            return response()->json(['requires_action' => true, 'payment_intent_client_secret' => $paymentIntent->client_secret]);
        } elseif ($paymentIntent->status == 'succeeded') {
            Compra::create([
                'fecha_compra' => now(),
                'total' => $total,
                'user_id' => $user->id,
            ])->disenios()->attach($carritoItems->pluck('disenio_id'));

            $cart->items()->delete();

            return response()->json(['success' => true, 'redirect_url' => route('payment.success')]);
        }

        return response()->json(['error' => 'Invalid PaymentIntent status']);
    }

    public function paymentCallback(Request $request)
    {
        return redirect()->route('mis-disenios')->with('success', '¡Pago realizado con éxito!');
    }
}
