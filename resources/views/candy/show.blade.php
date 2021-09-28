@extends('layouts.app')

@section('title') {{__('messages.detailsCandy')}} @endsection

@section('header-title') {{__('messages.candy')}} @endsection

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
                <h3>{{__('messages.price')}}</h3>
                <p>{{$data->getPrice()}}</p>

                <h3>{{__('messages.image')}}</h3>
                <img src="{{asset($data->getUrlImg())}}"/>

                <h3>{{__('messages.bouquetId')}}</h3>
                <p>{{$data->getBouquetId()}}</p>
                <h3>{{__('messages.comboId')}}</h3>
                <p>{{$data->getComboId()}}</p>
                @can('candy.edit')
                    <a href="{{route('candy.edit',$data->getId())}}" class="btn btn-success">{{__('messages.edit')}}</a>
                @endcan
            </div>            
        </div>
    </div>
</section>
@endsection
