@extends('auth.layouts')

@section('title', 'Checkout - MythicTarot')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">

<div class="container">
    <h1>Checkout</h1>
    <div class="row">
        <div class="col-md-6 resumen">
            <h4>Resumen del Pedido</h4>
            <ul class="list-group">
                @foreach ($carritoItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item->disenio->nombre_disenio }} (x{{ $item->cantidad }})
                        <span>${{ number_format($item->disenio->precio * $item->cantidad, 2) }}</span>
                    </li>
                @endforeach
            </ul>
            <h4 class="mt-3">Total: ${{ number_format($total, 2) }}</h4>
        </div>
        <div class="col-md-6 compra">
            <form id="payment-form">
                <div class="form-group">
                    <label for="card-number">Número de Tarjeta</label>
                    <div id="card-number"></div>
                </div>
                <div class="form-group">
                    <label for="card-expiry">Fecha de Expiración</label>
                    <div id="card-expiry"></div>
                </div>
                <div class="form-group">
                    <label for="card-cvc">CVC</label>
                    <div id="card-cvc"></div>
                </div>
                <div class="form-group">
                    <label for="postal-code">Código Postal</label>
                    <input type="text" id="postal-code" class="form-control" placeholder="Código Postal" >
                </div>
                <div id="card-errors" role="alert"></div>
                <button type="submit" class="btn btn-primary">Pagar</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements({
            fonts: [
                {
                    cssSrc: 'https://fonts.googleapis.com/css2?family=YourCustomFont:wght@400;700&display=swap',
                },
            ],
        });

        const style = {
            base: {
                fontFamily: 'YourCustomFont, sans-serif',
                fontSize: '16px',
                color: '#32325d',
                '::placeholder': {
                    color: '#aab7c4'
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const cardNumber = elements.create('cardNumber', { style: style });
        cardNumber.mount('#card-number');

        const cardExpiry = elements.create('cardExpiry', { style: style });
        cardExpiry.mount('#card-expiry');

        const cardCvc = elements.create('cardCvc', { style: style });
        cardCvc.mount('#card-cvc');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardNumber,
                billing_details: {
                    address: {
                        postal_code: document.getElementById('postal-code').value
                    }
                }
            });

            if (error) {
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                const response = await fetch("{{ route('processPayment') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        payment_method: paymentMethod.id
                    })
                });

                const result = await response.json();

                if (result.requires_action) {
                    stripe.handleCardAction(result.payment_intent_client_secret).then(function(result) {
                        if (result.error) {
                            alert('El pago falló.');
                        } else {
                            fetch("{{ route('processPayment') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    payment_intent_id: result.paymentIntent.id
                                })
                            }).then(function(confirmResult) {
                                return confirmResult.json();
                            }).then(handleServerResponse);
                        }
                    });
                } else if (result.success) {
                    window.location.href = result.redirect_url;
                } else {
                    alert('El pago falló.');
                }
            }
        });

        function handleServerResponse(response) {
            if (response.error) {
                alert('El pago falló.');
            } else if (response.requires_action) {
                stripe.handleCardAction(response.payment_intent_client_secret).then(handleServerResponse);
            } else {
                window.location.href = response.redirect_url;
            }
        }
    });
</script>
@endsection
