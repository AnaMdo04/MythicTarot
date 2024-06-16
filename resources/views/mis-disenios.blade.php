@extends('auth.layouts')

@section('content')
<div class="container">
    <link href="{{ asset('css/cartas.css') }}" rel="stylesheet">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Diseños Comprados</div>
                <div class="card-body">
                    @foreach($compras as $compra)
                        <div class="mb-4">
                            <h5>Compra realizada el: {{ $compra->created_at->format('d/m/Y') }}</h5>
                            <h6>Estado del envío: {{ $compra->estado_envio }}</h6>
                            <p>Tiempo estimado de llegada: {{ $compra->tiempo_estimado }}</p>
                            @foreach($compra->disenios as $disenio)
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $disenio->imagen_url) }}" alt="{{ $disenio->nombre_disenio }}" width="100">
                                        <h5 class="card-title">{{ $disenio->nombre_disenio }} (x{{ $disenio->pivot->cantidad }})</h5>
                                        <p class="card-text">{{ $disenio->descripcion }}</p>
                                        <p class="card-text">Precio: ${{ number_format($disenio->precio * $disenio->pivot->cantidad, 2) }}</p>
                                        @php
                                            $comentario = $disenio->comentarios()->where('user_id', Auth::id())->where('compra_id', $compra->id)->first();
                                        @endphp
                                        @if ($comentario)
                                            <div class="content-block small">
                                                <div class="small-image-container">
                                                    <img src="{{ $comentario->user->profile_image ? asset('storage/' . $comentario->user->profile_image) : 'https://use.fontawesome.com/releases/v5.15.4/svgs/solid/user-circle.svg' }}" alt="Usuario {{ $comentario->user->name }}" class="rounded-circle">
                                                </div>
                                                <div class="card-content">
                                                    <h5>{{ $comentario->user->name }}</h5>
                                                    <p>{{ $comentario->texto }}</p>
                                                    <p><small>{{ \Carbon\Carbon::parse($comentario->fecha_comentario)->format('d/m/Y') }}</small></p>
                                                </div>
                                            </div>
                                        @else
                                            @if ($compra->estado_envio == 'Entregado')
                                                <form action="{{ route('comentario.store', $disenio->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="compra_id" value="{{ $compra->id }}">
                                                    <div class="form-group">
                                                        <label for="comentario">Añadir Comentario</label>
                                                        <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Guardar Comentario</button>
                                                </form>
                                            @else
                                                <form action="{{ route('compra.entregar', $compra->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Marcar como Entregado</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $compras->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
