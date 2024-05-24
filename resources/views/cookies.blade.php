@extends('auth.layouts')

@section('title', 'Términos y Condiciones')

@section('content')

<link href="{{ asset('css/cookiesAndTerms.css') }}" rel="stylesheet">
<div class="content">

    <h1>Política de Cookies</h1>

    <h2>¿Qué son las cookies?</h2>

    <p>Las cookies son pequeños archivos de texto que se almacenan en su dispositivo (ordenador, teléfono, etc.) cuando visita sitios web. Ayudan a 
        recordar información sobre su visita, como su idioma preferido y otras opciones.</p>

    <h2>¿Cómo utilizamos las cookies?</h2>

    <p>En MythicTarot, utilizamos cookies para mejorar la experiencia del usuario, personalizar el contenido y los anuncios, proporcionar funcionalidades
         de redes sociales y analizar nuestro tráfico.</p>

    <h2>Tipos de cookies que utilizamos:</h2>

    <h4>Cookies técnicas:</h4>
    
    <p>Son necesarias para el funcionamiento de la plataforma y no se pueden desactivar en nuestros sistemas.</p>

    <h4>Cookies analíticas:</h4>
    
    <p>Nos permiten reconocer y contar el número de visitantes y ver cómo los visitantes se mueven por la plataforma.</p>

    <h4>Cookies de funcionalidad:</h4>
    
    <p>Se utilizan para reconocerlo cuando regresa a nuestra plataforma y permitirnos ofrecerle servicios mejorados y más personalizados.</p>

    <h2>Control de cookies</h2>

    <p>La mayoría de los navegadores le permiten controlar las cookies a través de sus configuraciones. Sin embargo, si limita la capacidad de
        los sitios web para establecer cookies, puede empeorar su experiencia de usuario general, ya que no será personalizada.</p>

    <h2>Cambios en la Política de Cookies</h2>

    <p>Podemos actualizar nuestra Política de Cookies de vez en cuando. Le recomendamos revisar esta política regularmente para cualquier cambio.</p>

    <h2>Contacto</h2>

    <p>Si tiene preguntas sobre nuestra política de cookies, por favor contáctenos a través de nuestra página de contacto.</p>

    </div>
    @endsection
