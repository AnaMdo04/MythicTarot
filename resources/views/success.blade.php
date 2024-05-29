

@extends('auth.layouts')

@section('title', 'Pago Exitoso - MythicTarot')

@section('content')

<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
<div class="container">
    <h1>Pago Exitoso</h1>
    <p>¡Gracias por tu compra! Tu pago se ha realizado correctamente.</p>
    <a href="{{ route('tienda.index') }}" class="btn btn-primary">Volver a la Tienda</a>
</div>
@endsection
