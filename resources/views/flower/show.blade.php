@extends('layouts.app')

@section('title') {{__('messages.details')}} @endsection

@section('header-title') {{__('messages.flower')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{$data->getName()}}</h1>
        <div class="card">
            <div class="card-header">{{__('messages.details')}}</div>
            <div class="card-body">
                <h3>{{__('messages.spice')}}</h3>
                <p>{{$data->getSpice()}}</p>
                <h3>{{__('messages.amountPerFlower')}}</h3>
                <p>{{$data->getAmountPerFlower()}}</p>
                <h3>{{__('messages.color')}}</h3>
                <p>{{$data->getColor()}}</p>
                <h3>{{__('messages.description')}}</h3>
                <p>{{$data->getDescription()}}</p>
                <h3>{{__('messages.price')}}</h3>
                <p>{{$data->getPrice()}}</p>
                <a href="{{route('flower.edit',$data->getId())}}" class="btn btn-success">{{__('messages.edit')}}</a>
            </div>            
        </div>
    </div>
</section>
@endsection
