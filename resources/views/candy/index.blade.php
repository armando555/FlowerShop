@extends('layouts.app')

@section('title') {{__('messages.listCandy')}} @endsection

@section('header-title') {{__('messages.candies')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.listCandy')}}</h1>
        @include('util.message')
        <div class="card">
            <div class="card-header">{{__('messages.allCandy')}}</div>
            <div class="card-body">
                @can('candy.create')
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" href="{{route('candy.create')}}">{{__('messages.createCandy')}}</a>
                    </div>
                @endcan
                <ul>
                    @foreach ($data as $item)
                    <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}</li>
                    <img class="img" src="{{asset('/storage/img/combos/'.$item->getUrlImg())}}"/>
                    <a class="btn btn-success" href="{{route('candy.show',$item->getId())}}">{{__('messages.details')}}</a>
                    <!--<a class="btn btn-primary" href="{{route('cart.addCandy',['id'=>$item->getId()])}}">{{__('messages.addCart')}}</a>-->
                    <form method="POST" action="{{route('cart.addCandy',['id'=>$item->getId()])}}">
                        @csrf
                        <label for="exampleInputName" class="font-weight-bold">{{__('messages.quantity')}}</label>
                        <input name="quantity" type="numeric" value="1">  
                        <button type="submit" class="btn btn-primary">{{__('messages.addCart')}}</button>
                    </form>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection
