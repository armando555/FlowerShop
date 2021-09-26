@extends('layouts.app')

@section('title') {{'List of combos'}} @endsection

@section('header-title') {{'combo'}} @endsection

@section('content')


<style>
    .btn.btn-success:hover{
        background-color: #157f8f;
        border: none;
    }
    .img{
        width: 500px;
        height: 350px;

    }
</style>


<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">List of Combos</h1>
        <div class="card">
            <div class="card-header">These are all our combos</div>
            <div class="card-body">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{route('combo.create')}}">{{__('messages.createCombo')}}</a>
                </div>
                <ul>
                    @foreach ($data as $combo)
                    <li>{{ $combo->getId() }} - {{ $combo->getName() }} : {{ $combo->getPrice() }}
                    <img class="img" src="{{asset($combo->getUrlImg())}}"/>
                    </li>
                    <a class="btn btn-success" href="{{route('combo.show',$combo->getId())}}">{{__('messages.details')}}</a>
                    <!--<a class="btn btn-primary" href="{{route('cart.addCombo',['id'=>$combo->getId()])}}">{{__('messages.addCart')}}</a>-->
                    <form method="POST" action="{{route('cart.addCombo',['id'=>$combo->getId()])}}">
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