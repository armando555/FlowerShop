@extends('layouts.app')

@section('title') {{'Create Bouquet'}} @endsection

@section('header-title') {{'Bouquets'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">Update a bouquet</h1>
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
                @endif
                <form method="POST" action="{{ route('bouquet.update') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data->getId()}}">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{$data->getName()}}">
                        
                        <label for="exampleInputSpice">Type</label>
                        <input type="text" class="form-control" name="bouquetType" aria-describedby="nameHelp" placeholder="Enter Type" value="{{$data->getBouquetType()}}">

                        <label for="exampleInputName">Rate</label>
                        <input type="text" class="form-control" name="rate" aria-describedby="nameHelp" placeholder="Enter rate" value="{{$data->getRate()}}">
                                                     
                        <label for="exampleInputDescription">urlImg</label>
                        <input type="text" class="form-control" name="urlImg" aria-describedby="nameHelp" placeholder="Enter URL image" value="{{$data->getUrlImg()}}">
                        
                        <label for="exampleInputPrice">Price</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="Enter price" value="{{$data->getPrice()}}">
                        <label for="exampleInputUrlImg">{{__('messages.flower')}}</label>
                        <select name="flower1" class="form-control form-control-sm">
                            @foreach ($flowers as $flower)
                                <option>{{$flower->getName()}}</option>
                            @endforeach
                        </select>
                        <br>
                        <select name="flower2" class="form-control form-control-sm">
                            @foreach ($flowers as $flower)
                                <option>{{$flower->getName()}}</option>
                            @endforeach
                        </select>
                        <br>
                        <select name="flower3" class="form-control form-control-sm">
                            @foreach ($flowers as $flower)
                                <option>{{$flower->getName()}}</option>
                            @endforeach
                        </select>
                        <br>
                        <input class="btn btn-success" type="submit" value="Update bouquet" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection