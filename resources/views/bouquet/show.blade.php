@extends('layouts.app')

@section('title') {{__('messages.detailsBouquet')}} @endsection

@section('header-title') {{__('messages.bouquets')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{$data->getName()}}</h1>
        <div class="card">
            <div class="card-header">These are all the details of this bouquet:</div>
            <div class="card-body">
                <h3>Bouquet type</h3>
                <p>{{$data->getBouquetType()}}</p>
                <h3>rate</h3>
                <p>{{$data->getRate()}}</p>
                <h3>Price</h3>
                <p>{{$data->getPrice()}}</p>
                <h3>{{__('messages.flower')}}</h3>
                <ul>
                    @foreach ($flowers as $flower)
                    <li>{{$flower->getName()}}</li>    
                    @endforeach                    
                </ul>
                <a href="{{route('bouquet.edit',$data->getId())}}" class="btn btn-success">{{__('messages.edit')}}</a>
            </div>            
        </div>
    </div>
</section>
@endsection