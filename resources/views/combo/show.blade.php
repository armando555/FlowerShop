@extends('layouts.app')

@section('title') {{__('messages.detailsCombo')}} @endsection

@section('header-title') {{__('messages.combo')}} @endsection

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
                @can('combo.edit')
                    <a href="{{route('combo.edit',$data->getId())}}" class="btn btn-success">Edit</a>
                @endcan

                <img class="img" src="{{asset('/storage/img/combos/'.$data->getUrlImg())}}"/>
                <h3>{{__('messages.flower')}}</h3>
                <ul>
                    @foreach ($flowers as $flower)
                    <li>{{$flower->getName()}}</li>    
                    @endforeach                    
                </ul>

            </div>            
        </div>
    </div>
</section>
@endsection
