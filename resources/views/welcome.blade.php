@extends('auth.layouts')

@section('title', 'Inicio - MythicTarot')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="banner-area">
                <div class="banner">Encabezado</div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="content-block large"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
            <div class="content-block small mt-3"></div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="content-block large"></div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="opinion">Opinión</div>
        </div>
        <div class="col-md-4">
            <div class="opinion">Opinión</div>
        </div>
        <div class="col-md-4">
            <div class="opinion">Opinión</div>
        </div>
    </div>
