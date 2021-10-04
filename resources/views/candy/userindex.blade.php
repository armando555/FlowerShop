@extends('layouts.app')

@section('title') {{__('messages.listCandy')}} @endsection

@section('header-title') {{__('messages.candies')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.listCandy')}}</h1>
        <div class="card">
            <div class="card-header">{{__('messages.allCandy')}}</div>
            <div class="card-body">
                <ul>
                    @foreach ($data['candies'] as $candy)
                    <li>{{ $data['candy']->getId() }} - {{ $data['candy']->getName() }} : {{ $data['candy']->getPrice() }}</li>
                    <img class="img" src="{{asset('/storage/img/combos/'.$data['candy']->getUrlImg())}}"/>
                    <a class="btn btn-success" href="{{route('candy.show.user',$data['candy']->getId())}}">{{__('messages.details')}}</a>
                    <!--<a class="btn btn-primary" href="{{route('cart.addCandy',['id'=>$data['candy']->getId()])}}">{{__('messages.addCart')}}</a>-->
                    <form method="POST" action="{{route('cart.addCandy',['id'=>$data['candy']->getId()])}}">
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
