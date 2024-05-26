@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Carta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('carta.update', $carta->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre_carta">Nombre de la Carta</label>
                            <input type="text" class="form-control" id="nombre_carta" name="nombre_carta" value="{{ $carta->nombre_carta }}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $carta->descripcion }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="imagen_url">Imagen</label>
                            <input type="file" class="form-control-file" id="imagen_url" name="imagen_url">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>

                    <form method="POST" action="{{ route('carta.destroy', $carta->id) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Carta</button>
                    </form>

                    <a href="{{ route('cartas') }}" class="btn btn-secondary mt-3">Volver a Mis Cartas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection