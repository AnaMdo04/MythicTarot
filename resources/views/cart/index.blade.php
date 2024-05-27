@extends('auth.layouts')

@section('title', 'Mi Carrito - MythicTarot')

@section('content')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">

<div class="container">
    <h1>Mi Carrito</h1>

    @if ($cart && $cart->items->count())
        <ul class="list-group">
            @foreach ($cart->items as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item->disenio->nombre_disenio }} (x{{ $item->cantidad }})
                    <span>${{ number_format($item->disenio->precio * $item->cantidad, 2) }}</span>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h4 class="mt-3">Total: ${{ number_format($cart->items->sum(function($item) {
            return $item->disenio->precio * $item->cantidad;
        }), 2) }}</h4>

        <a href="{{ route('checkout') }}" class="btn btn-primary mt-3">Proceder al Pago</a>
    @else
        <p>No tienes artículos en tu carrito.</p>
    @endif
</div>
@endsection
