@extends('layouts.app')

@section('title') {{'Details Combo'}} @endsection

@section('header-title') {{'Combo'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{$data->getName()}}</h1>
        <div class="card">
            <div class="card-header">{{__('messages.detailsCombo')}}</div>
            <div class="card-body">
                <h3>{{__('messages.name')}}</h3>
                <p>{{$data->getName()}}</p>
                <h3>{{__('messages.bouquetType')}}</h3>
                <p>{{$data->getBouquetType()}}</p>
                <h3>{{__('messages.rate')}}</h3>
                <p>{{$data->getRate()}}</p>
                <h3>{{__('messages.price')}}</h3>
                <p>{{$data->getPrice()}}$</p>
                <h3>{{__('messages.image')}}</h3>
                <img src="{{asset($data->getUrlImg())}}"/>
                <a href="{{route('combo.edit',$data->getId())}}" class="btn btn-success">Edit</a>
            </div>            
        </div>
    </div>
</section>
@endsection
