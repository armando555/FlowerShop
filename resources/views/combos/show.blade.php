@extends('layouts.else')

@section('content')

<!-- links Section-->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/show.css') }}">
<!-- styles section -->

<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Details</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
            
        </div>
        <div class="details-table">
                <h5>Id:</h5>                    
                {{$data->getId()}}
                <h5>Type:</h5>                    
                {{$data->getBouquetType()}}
                <h5>Rate:</h5>                    
                {{$data->getRate()}}
                <h5>Price:</h5>
                ${{$data->getPrice()}}
                <form method="POST" action="{{route('combo.delete',$data->getId())}}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class ="btn-show-delete">Delete</button>
                </form>
        </div>
        <div>
    </div>
</section>

@endsection