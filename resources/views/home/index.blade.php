@extends('layouts.app')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">

<!-- styles section -->
<style>
    .div-botones {
        display: grid;
        grid-column: auto;

    }

    .btn-vista {
        color: #ffffff;
        padding: 0.8rem;
        margin-top: 10px;
        border-radius: 1rem;
        background-color: #1abc9c;
        

        border: none;
        text-decoration: none;
        font-size: x-large;
        justify-content: center;
        align-content: center;
        text-align: center;
        cursor: pointer;
    }

    .btn-vista:hover {
        background-color: #1ea68b;
        text-decoration: none;
        color: #ffffff;
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
            <a class="btn-vista" href="{{route('create')}}"> Actividad 2</a>
            <a class="btn-vista"> Actividad 4</a>
        </div>
    </div>
</section>

@endsection