<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Disenio;
use App\Models\Compra;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CompraComentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompraController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $carritoItems = $cart ? $cart->items : [];
        $total = $carritoItems->sum(function ($item) {
            return $item->disenio->precio * $item->cantidad;
        });

        return view('checkout', compact('carritoItems', 'total'));
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Log::info('Stripe API key set.');

        $user = Auth::user();
        $cart = $user->cart;
        $carritoItems = $cart ? $cart->items : [];

        $total = $carritoItems->sum(function ($item) {
            return $item->disenio->precio * $item->cantidad;
        });

        Log::info('Total amount calculated.', ['total' => $total]);

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $total * 100,
                'currency' => 'usd',
                'payment_method' => $request->payment_method,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('payment.callback'),
            ]);

            Log::info('PaymentIntent created.', ['payment_intent' => $paymentIntent]);

            if ($paymentIntent->status == 'requires_action' && $paymentIntent->next_action->type == 'use_stripe_sdk') {
                Log::info('Payment requires additional action.');
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret
                ]);
            } elseif ($paymentIntent->status == 'succeeded') {
                Log::info('Payment succeeded.');

                $compra = Compra::create([
                    'fecha_compra' => now(),
                    'total' => $total,
                    'user_id' => $user->id,
                    'estado_envio' => 'Procesando',
                    'tiempo_estimado' => '3-5 días hábiles'
                ]);

                foreach ($carritoItems as $item) {
                    $compra->disenios()->attach($item->disenio_id, ['cantidad' => $item->cantidad]);
                }

                $cart->items()->delete();

                return response()->json([
                    'success' => true,
                    'redirect_url' => route('payment.success')
                ]);
            }

            Log::error('Invalid PaymentIntent status.', ['status' => $paymentIntent->status]);
            return response()->json(['error' => 'Invalid PaymentIntent status']);
        } catch (\Exception $e) {
            Log::error('Stripe Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function paymentCallback(Request $request)
    {
        return redirect()->route('mis-disenios')->with('success', '¡Pago realizado con éxito!');
    }

    public function entregar($compra_id)
    {
        $compra = Compra::findOrFail($compra_id);
        $compra->estado_envio = 'Entregado';
        $compra->save();

        return redirect()->route('mis-disenios')->with('success', 'Compra marcada como entregada.');
    }

    public function storeComentario(Request $request, $disenio_id)
    {
        $request->validate([
            'comentario' => 'required|string|max:255',
        ]);

        $existingComentario = CompraComentario::where('user_id', Auth::id())
            ->where('disenio_id', $disenio_id)
            ->where('compra_id', $request->compra_id)
            ->first();

        if ($existingComentario) {
            return redirect()->route('tienda.show', $disenio_id)->with('error', 'Ya has comentado este diseño para esta compra.');
        }

        CompraComentario::create([
            'texto' => $request->comentario,
            'user_id' => Auth::id(),
            'disenio_id' => $disenio_id,
            'compra_id' => $request->compra_id,
            'fecha_comentario' => now(),
        ]);

        return redirect()->route('tienda.show', $disenio_id)->with('success', 'Comentario añadido.');
    }
}
