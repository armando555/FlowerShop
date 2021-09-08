@extends('layouts.app')

@section('title') {{'Details flower'}} @endsection

@section('header-title') {{'Flower'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{$data->getName()}}</h1>
        <div class="card">
            <div class="card-header">These are all the details of this flower:</div>
            <div class="card-body">
                <h3>Spice</h3>
                <p>{{$data->getSpice()}}</p>
                <h3>Amount per flower</h3>
                <p>{{$data->getAmountPerFlower()}}</p>
                <h3>Color</h3>
                <p>{{$data->getColor()}}</p>
                <h3>Description</h3>
                <p>{{$data->getDescription()}}</p>
                <h3>Price</h3>
                <p>{{$data->getPrice()}}</p>
                <a href="{{route('flower.edit',$data->getId())}}" class="btn btn-success">Edit</a>
            </div>            
        </div>
    </div>
</section>
@endsection
