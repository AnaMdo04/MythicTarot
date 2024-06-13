@extends('auth.layouts')

@section('title', 'Sobre Nosotros - MythicTarot')

@section('content')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-12 text-center my-3">
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">
                <div class="left-image-container">
                    <img src="{{ asset('img/nuestraMision.webp') }}" alt="Imagen Nuestra Misión" class="img-fluid">
                </div>
                <div class="right-content-container">
                    <h1>Nuestra Misión</h1>
                    <p>En MythicTarot, nuestro objetivo es conectar a las personas con la sabiduría ancestral del tarot, proporcionando lecturas precisas y personalizadas que ayuden a nuestros usuarios a encontrar guía y claridad en sus vidas diarias.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">
                <div class="right-content-container">
                    <h2>Nuestra Visión</h2>
                    <p>Aspiramos a ser la plataforma líder en lecturas de tarot digital, innovando constantemente en nuestras tecnologías para ofrecer experiencias enriquecedoras que fomenten el autoconocimiento y el crecimiento personal.</p>
                </div>
                <div class="left-image-container">
                    <img src="{{ asset('img/nuestraVision.webp') }}" alt="Imagen Nuestra Visión" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">
                <div class="left-image-container">
                    <img src="{{ asset('img/whyMythictarot.webp') }}" alt="Imagen MythicTarot" class="img-fluid">
                </div>
                <div class="right-content-container">
                    <h2>¿Por qué MythicTarot?</h2>
                    <p>MythicTarot nace de la pasión por el misticismo y la tecnología. Cada carta y lectura están diseñadas para que interactúes con los arquetipos y símbolos de una manera que resuene profundamente con tu vida personal y espiritual.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">
                <div class="right-content-container">
                    <h2>Nuestro Equipo</h2>
                    <p>Compuesto por expertos en tarot, desarrolladores, y artistas, nuestro equipo trabaja incansablemente para asegurar que cada experiencia en MythicTarot sea única y personal.</p>
                </div>
                <div class="left-image-container">
                    <img src="{{ asset('img/nuestroEquipo.webp') }}" alt="Imagen PNuestro Equipo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection