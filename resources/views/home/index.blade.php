@extends('layouts.app')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">

<!-- styles section -->
<style>
    .div-botones {
        display: flex;
        flex-direction: column;

    }

    .btn-vista {
        padding: 0.8rem;
        margin-top: 10px;
        border-radius: 1rem;
        background-color: #1abc9c;
        color: white;
        border: none;
        text-decoration: bold;
        font-size: x-large;
    }

    .btn-vista:hover {
        background-color: #1ea68b;
    }
</style>

<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Navegar</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="div-botones">
            <button class="btn-vista"> Actividad 2</button>
            <button class="btn-vista"> Actividad 4</button>
        </div>
    </div>
</section>

@endsection