@extends('layouts.app')

@section('title') {{'List of bouquets'}} @endsection

@section('header-title') {{'Bouquets'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">List of bouquets</h1>
        <div class="card">
            <div class="card-header">These are all the bouquets in the store</div>
            <div class="card-body">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{route('bouquet.create')}}">{{__('messages.createBouquet')}}</a>
                </div>
                <ul>
                    @foreach ($data as $item)
                    <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}</li>
                    <a class="btn btn-success" href="{{route('bouquet.show',$item->getId())}}">{{__('messages.details')}}</a>
                    <!--<a class="btn btn-primary" href="{{route('cart.addBouquet',['id'=>$item->getId()])}}">{{__('messages.addCart')}}</a>-->
                    <form method="POST" action="{{route('cart.addBouquet',['id'=>$item->getId()])}}">
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