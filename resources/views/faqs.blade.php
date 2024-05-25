@extends('auth.layouts')

@section('title', 'FAQs - MythicTarot')

@section('content')
<link href="{{ asset('css/faqs.css') }}" rel="stylesheet">

<div class="mt-5">
    <h1>Preguntas Frecuentes</h1>
    <div class="accordion" id="accordionExample">
        @foreach ($faqs as $index => $faq)
        <div class="card">
            <div class="card-header" id="heading{{ $index }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed">
                        {{ $faq['question'] }}
                    </button>
                </h2>
            </div>
            <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                <div class="card-body">
                    {{ $faq['answer'] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection