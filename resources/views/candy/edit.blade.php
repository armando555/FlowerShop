@extends('layouts.app')

@section('title') {{__('messages.updateCandy')}} @endsection

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
                <form method="POST" action="{{ route('candy.update') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data->getId()}}">
                        
                        <label for="exampleInputName">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="{{__('messages.enterName')}}" value="{{$data->getName()}}">
                         
                        <label for="exampleInputPrice">{{__('messages.Price')}}</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp" placeholder="{{__('messages.price')}}" value="{{$data->getPrice()}}">
                        
                        <div class="mb-3 mt-2" >
                            <label for="formFile" class="form-label">{{__('messages.image')}}</label>
                            <input class="form-control" type="file" id="formFile" value="{{$data->getUrlImg()}}" name="urlImg">
                        </div>

                        
                        
                        <br>
                        <input class="btn btn-success" type="submit" value="{{__('messages.createCombo')}}" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
