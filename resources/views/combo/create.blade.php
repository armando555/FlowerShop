@extends('layouts.app')

@section('title') {{__('messages.createCombo')}} @endsection

@section('header-title') {{'Combo'}} @endsection

@section('content')

<style>
    .btn.btn-success{
        background-color: #17a2b8;
        border: none;
    }
    .btn.btn-success:hover{
        background-color: #157f8f;
        border: none;
    }
    .row.justify-content-center{
        padding-top: 20px; 
        padding-bottom: 20px;
    }
</style>

<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.createCombo')}}</h1>
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
                <form method="POST" action="{{ route('combo.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
     
                        <label for="exampleInputName">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="{{__('messages.enterName')}}" value="{{old('name')}}">
                        
                        <label for="exampleInputBouquetType">{{__('messages.bouquetType')}}</label>
                        <input type="text" class="form-control" name="bouquetType" aria-describedby="nameHelp" placeholder="{{__('messages.enterBouquetType')}}" value="{{old('boquetType')}}">
                        
                        <label for="exampleRate">{{__('messages.rate')}}</label>
                        <input type="numeric" class="form-control" name="rate" aria-describedby="numHelp" placeholder="{{__('messages.enterRate')}}" value="{{old('rate')}}">
                        
                        <label for="exampleInputPrice">{{__('messages.price')}}</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="{{__('messages.enterPrice')}}" value="{{old('price')}}">

                        
                        <div class="mb-3 mt-2" >
                            <label for="formFile" class="form-label">{{__('messages.image')}}</label>
                            <input class="form-control" type="file" id="formFile" value="{{old('urlImg')}}" name="urlImg">
                        </div>

                        
                        
                        <label for="exampleInputUrlImg">{{__('messages.flower')}}</label>
                        
                        <select name="flower1" class="form-control form-control-sm">
                            @foreach ($data as $flower)
                                <option>{{$flower->getName()}}</option>
                            @endforeach
                        </select>
                        <br>
                        <select name="flower2" class="form-control form-control-sm">
                            @foreach ($data as $flower)
                                <option>{{$flower->getName()}}</option>
                            @endforeach
                        </select>
                        <br>
                        <select name="flower3" class="form-control form-control-sm">
                            @foreach ($data as $flower)
                                <option>{{$flower->getName()}}</option>
                            @endforeach
                        </select>
                        <br>
                        <input class="btn btn-success" type="submit" value="{{__('messages.createCombo')}}" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
