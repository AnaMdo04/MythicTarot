@extends('auth.layouts')

@section('title', 'Inicio - MythicTarot')

@section('content')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet"> <!-- Asegúrate de que esta línea esté presente -->

<div class="container">
    <div class="row">
        <div class="col-12 text-center my-3">
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large">  
                <div class="content-block picture-small">
                </div>
        </div></div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <div class="content-block medium"></div>
        </div>
        <div class="col-md-6">
            <div class="content-block medium"></div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="content-block large"></div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
        <div class="col-md-4">
            <div class="content-block small"></div>
        </div>
    </div>
    </div>
</div>
@endsection
