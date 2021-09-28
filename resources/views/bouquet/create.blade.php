@extends('layouts.app')

@section('title') {{__('messages.createBouquet')}} @endsection

@section('header-title') {{__('messages.bouquets')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.createBouquet')}}</h1>
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
                //attributes id, name, bouquetType, rate, price, urlImg, created_at, updated_at
                @endif
                <form method="POST" action="{{ route('bouquet.save') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="{{__('messages.enterName')}}" value="{{old('name')}}">
                        
                        <label for="exampleInputSpice">{{__('messages.bouquetType')}}</label>
                        <input type="text" class="form-control" name="bouquetType" aria-describedby="nameHelp" placeholder="{{__('messages.enterBouquetType')}}" value="{{old('bouquetType')}}">

                        <label for="exampleInputName">{{__('messages.rate')}}</label>
                        <input type="text" class="form-control" name="rate" aria-describedby="nameHelp" placeholder="{{__('messages.enterRate')}}" value="{{old('rate')}}">
                                                     
                        <div class="mb-3 mt-2" >
                            <label for="formFile" class="form-label">{{__('messages.image')}}</label>
                            <input class="form-control" type="file" id="formFile" value="{{old('urlImg')}}" name="urlImg">
                        </div>
                                         
                        <label for="exampleInputPrice">{{__('messages.price')}}</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="{{__('messages.price')}}" value="{{old('price')}}">
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
                        <input class="btn btn-success" type="submit" value="{{__('messages.createBouquet')}}" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection