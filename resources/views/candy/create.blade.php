@extends('layouts.app')

@section('title') {{__('messages.createCandy')}} @endsection

@section('header-title') {{__('messages.candy')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.updateCandy')}}</h1>
        @include('util.message')
        <div class="card">
            <div class="card-header">{{__('messages.completeFields')}}</div>
            <div class="card-body">
                @if($errors->any())
                
                <ul id="errors">
                    <h3 class="text-danger">{{__('messages.errors')}}</h3>
                    @foreach($errors->all() as $error)
                    
                    <li>{{ $error }}</li>
                    
                    @endforeach
                    
                </ul>
                
                @endif
                <form method="POST" action="{{ route('candy.create') }}">
                    @csrf
                    <div class="form-group">
                        
                        
                        <label for="exampleInputName">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="{{__('messages.enterName')}}" value="{{old('name')}}">
                         
                        <label for="exampleInputPrice">{{__('messages.Price')}}</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp" placeholder="{{__('messages.price')}}" value="{{old('price')}}">
                        
                        <label for="exampleInputDescription">{{__('messages.image')}}</label>
                        <input type="text" class="form-control" name="urlImg" aria-describedby="nameHelp" placeholder="{{__('messages.enterImage')}}" value="{{old('urlImg')}}">
                        
                        <label for="exampleInputBouquetId">{{__('messages.bouquetId')}}</label>
                        <input type="text" class="form-control" name="bouquet_id" aria-describedby="nameHelp" placeholder="{{__('messages.enterBouquetId')}}" value="{{old('bouquet_id')}}">
                        
                        <label for="exampleInputComboId">{{__('messages.comboId')}}</label>
                        <input type="text" class="form-control" name="combo_id" aria-describedby="nameHelp" placeholder="{{__('messages.enterComboId')}}" value="{{old('combo_id')}}">
                        
                        <br>
                        <input class="btn btn-success" type="submit" value="{{__('messages.createCandy')}}" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
