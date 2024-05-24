@extends('auth.layouts')

@section('title', 'FAQs - MythicTarot')

@section('content')
<link href="{{ asset('css/faqs.css') }}" rel="stylesheet">

<div class="mt-5">
    <h2>Preguntas Frecuentes</h2>
    <div class="accordion" id="accordionExample">
        @for ($i = 1; $i <= 8; $i++)
            <div class="card">
                <div class="card-header" id="heading{{ $i }}">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                            Pregunta {{ $i }}
                        </button>
                    </h2>
                </div>
                <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        Respuesta {{ $i }}
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
