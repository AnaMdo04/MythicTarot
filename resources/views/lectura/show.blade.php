@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de la Lectura</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h5 class="card-title">{{ $lectura->fecha_lectura }}</h5>
                    <p class="card-text">{{ $lectura->respuesta }}</p>

                    <form method="POST" action="{{ route('lectura.update', $lectura->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="respuesta">Editar Respuesta</label>
                            <textarea class="form-control @error('respuesta') is-invalid @enderror" id="respuesta" name="respuesta" rows="3">{{ old('respuesta', $lectura->respuesta) }}</textarea>
                            @error('respuesta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                    </form>

                    <form method="POST" action="{{ route('lectura.destroy', $lectura->id) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Lectura</button>
                    </form>

                    <a href="{{ route('lecturas') }}" class="btn btn-secondary mt-3">Volver a Mis Lecturas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection