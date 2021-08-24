@extends('layouts.else')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/create.css') }}">
<!-- styles section -->

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
        <div>
            <form class="form-create" method="POST" action="{{route('create.save')}}">
                @csrf
                <input class="input-create" name="name" type="text" placeholder="Name" />
                <input class="input-create" name="bouquetType" type="text" placeholder="Bouquet Type"/>
                <input class="input-create" name="rate" type="text" placeholder="Rate"/>
                <input class="input-create" name="price" type="text" placeholder="Price"/>
                <input class="btn-create" type="submit" value="Send" />
            </form>
        </div>
    </div>
</section>

@endsection