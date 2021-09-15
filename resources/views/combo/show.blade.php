@extends('layouts.app')

@section('title') {{'Details Combo'}} @endsection

@section('header-title') {{'Combo'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{$data->getName()}}</h1>
        <div class="card">
            <div class="card-header">These are all the details of this Combo:</div>
            <div class="card-body">
                <h3>Name</h3>
                <p>{{$data->getName()}}</p>
                <h3>Bouquet Type</h3>
                <p>{{$data->getBouquetType()}}</p>
                <h3>Rate</h3>
                <p>{{$data->getRate()}}</p>
                <h3>Price</h3>
                <p>{{$data->getPrice()}}$</p>
                <h3>Image</h3>
                <img src="{{asset($data->getUrlImg())}}"/>
                <a href="{{route('combo.edit',$data->getId())}}" class="btn btn-success">Edit</a>
            </div>            
        </div>
    </div>
</section>
@endsection
