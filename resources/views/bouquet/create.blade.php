@extends('layouts.app')

@section('title') {{'Create Bouquet'}} @endsection

@section('header-title') {{'Bouquets'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">Create a bouquet</h1>
        @include('util.message')
        <div class="card">
            <div class="card-header">Complete the fields</div>
            <div class="card-body">
                @if($errors->any())
                
                <ul id="errors">
                    <h3 class="text-danger">Errors</h3>
                    @foreach($errors->all() as $error)
                    
                    <li>{{ $error }}</li>
                    
                    @endforeach
                    
                </ul>
                //attributes id, name, bouquetType, rate, price, urlImg, created_at, updated_at
                @endif
                <form method="POST" action="{{ route('bouquet.save') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{old('name')}}">
                        
                        <label for="exampleInputSpice">Type</label>
                        <input type="text" class="form-control" name="bouquetType" aria-describedby="nameHelp" placeholder="Enter Type" value="{{old('bouquetType')}}">

                        <label for="exampleInputName">Rate</label>
                        <input type="text" class="form-control" name="rate" aria-describedby="nameHelp" placeholder="Enter rate" value="{{old('rate')}}">
                                                     
                        <label for="exampleInputDescription">urlImg</label>
                        <input type="text" class="form-control" name="urlImg" aria-describedby="nameHelp" placeholder="Enter URL image" value="{{old('urlImage')}}">
                        
                        <label for="exampleInputPrice">Price</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="Enter price" value="{{old('price')}}">
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
                        <input class="btn btn-success" type="submit" value="Create bouquet" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection