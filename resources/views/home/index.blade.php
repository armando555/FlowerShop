@extends('layouts.app')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">

<!-- styles section -->
<style>

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
            <a class="btn-vista" href="{{route('combos.list')}}"> Actividad 4</a>
        </div>
    </div>
</section>

@endsection