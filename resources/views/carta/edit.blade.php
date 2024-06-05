@extends('auth.layouts')

@section('content')
<div class="container">
    <h1>Editar Carta</h1>

    <form action="{{ route('cartas.update', $carta->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_carta">Nombre de la Carta</label>
            <input type="text" name="nombre_carta" id="nombre_carta" class="form-control" value="{{ $carta->nombre_carta }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $carta->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="imagen_url">Imagen</label>
            <input type="file" name="imagen_url" id="imagen_url" class="form-control">
        </div>

        <div class="form-group">
            <label for="disenio_id">Diseño</label>
            <select name="disenio_id" id="disenio_id" class="form-control">
                @foreach ($disenios as $disenio)
                    <option value="{{ $disenio->id }}" {{ $disenio->id == $carta->pivot->disenio_id ? 'selected' : '' }}>
                        {{ $disenio->nombre_disenio }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>
@endsection
