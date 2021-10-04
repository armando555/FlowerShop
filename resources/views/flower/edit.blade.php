@extends('layouts.app')

@section('title') {{__('messages.updateFlower')}} @endsection

@section('header-title') {{__('messages.flower')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.updateFlower')}}</h1>
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
                <form method="POST" action="{{ route('flower.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data['flower']->getId()}}">
                        <label for="exampleInputName">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{$data['flower']->getName()}}">
                        
                        <label for="exampleInputSpice">{{__('messages.spice')}}</label>
                        <input type="text" class="form-control" name="spice" aria-describedby="nameHelp" placeholder="Enter spice" value="{{$data['flower']->getSpice()}}">
                        
                        <label for="exampleInputAmountPerFlower">{{__('messages.amountPerFlower')}}</label>
                        <input type="numeric" class="form-control" name="amountPerFlower" aria-describedby="numHelp" placeholder="Enter amount per flower" value="{{$data['flower']->getAmountPerFlower()}}">
                        
                        <label for="exampleInputColor">{{__('messages.color')}}</label>
                        <input type="text" class="form-control" name="color" aria-describedby="nameHelp" placeholder="Enter color" value="{{$data['flower']->getColor()}}">
                        
                        <label for="exampleInputDescription">{{__('messages.description')}}</label>
                        <input type="text" class="form-control" name="description" aria-describedby="nameHelp" placeholder="Enter description" value="{{$data['flower']->getDescription()}}">
                        
                        <label for="exampleInputPrice">{{__('messages.price')}}</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="Enter price" value="{{$data['flower']->getPrice()}}">
                        
                        <div class="mb-3 mt-2" >
                            <label for="formFile" class="form-label">{{__('messages.image')}}</label>
                            <input class="form-control" type="file" id="formFile" value="{{$data['flower']->getUrlImg()}}" name="urlImg">
                        </div>

                        
                        <br>
                        <input class="btn btn-success" type="submit" value="{{__('messages.updateFlower')}}" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
