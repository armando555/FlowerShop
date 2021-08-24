@extends('layouts.else')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
<!-- styles section -->




<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Combos</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
            
        </div>
        <div class="combos-list">
            <ul id="errors">
                <div hidden>
                {{$count = 0}}
                </div>
                @foreach($data["combos"] as $combo)
                @if ($count <= 1)
                    <li class="item-li"><b>• id: {{ $combo->getId() }}<tr></tr> Type: {{ $combo->getBouquetType() }}  <tr></tr> Price: {{ $combo->getPrice() }}$</b>
                    <a href="{{route('combos.show',$combo->getId())}}" class="btn-details">Details </a></li>
                @else
                <li class="item-li">• id: {{ $combo->getId() }}<tr></tr> Type: {{ $combo->getBouquetType() }}  <tr></tr> Price: {{ $combo->getPrice() }}$
                <a href="{{route('combos.show',$combo->getId())}}" class="btn-details">Details </a></li>
                @endif
                
                <div hidden>
                    {{$count = $count+1}}
                </div>
                
                @endforeach
                
            </ul>
        <div>
    </div>
</section>

@endsection