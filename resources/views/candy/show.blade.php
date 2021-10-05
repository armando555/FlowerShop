@extends('layouts.app')

@section('title') {{__('messages.detailsCandy')}} @endsection

@section('header-title') {{__('messages.candy')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{$data['candy']->getName()}}</h1>
        <div class="card">
            <div class="card-header">{{__('messages.detailsCombo')}}</div>
            <div class="card-body">
                <h3>{{__('messages.name')}}</h3>
                <p>{{$data['candy']->getName()}}</p>
                <h3>{{__('messages.price')}}</h3>
                <p>{{$data['candy']->getPrice()}}</p>

                <h3>{{__('messages.image')}}</h3>
                <img class="img imagen-items" src="{{asset('/storage/img/combos/'.$data['candy']->getUrlImg())}}"/>

                @can('candy.edit')
                    <a href="{{route('candy.edit',$data['candy']->getId())}}" class="btn btn-success">{{__('messages.edit')}}</a>
                    <a href="{{route('candy.delete',$data['candy']->getId())}}" class="btn btn-danger">{{__('messages.delete')}}</a>
                @endcan
            </div>            
        </div>
    </div>
</section>
@endsection
