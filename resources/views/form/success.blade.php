@extends('layouts.else')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/success.css') }}">
<!-- styles section -->
<style>

</style>

<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="div-success">
            <h1 class="titulo-success">
                Campo creado satisfactoriamente
            </h1>
            <a class="btn-volver" href="{{route('home.index')}}">Volver</a>
        </div>
    </div>
</section>

@endsection