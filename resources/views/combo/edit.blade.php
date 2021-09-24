@extends('layouts.app')

@section('title') {{'Update Flower'}} @endsection

@section('header-title') {{'Flower'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">Update a Combo</h1>
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
                <form method="POST" action="{{ route('combo.update') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data->getId()}}">
                        
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{$data->getName()}}">
                        
                        <label for="exampleInputbouquetType">Bouquet Type</label>
                        <input type="text" class="form-control" name="bouquetType" aria-describedby="nameHelp" placeholder="Enter bouquet type" value="{{$data->getBouquetType()}}">                        
                        
                        <label for="exampleInputRate">Rate</label>
                        <input type="numeric" class="form-control" name="rate" aria-describedby="numHelp" placeholder="Enter rate" value="{{$data->getRate()}}">
                        
                        <label for="exampleInputPrice">Price</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp" placeholder="Enter price" value="{{$data->getPrice()}}">
                        
                        <label for="exampleInputDescription">Url Image</label>
                        <input type="text" class="form-control" name="urlImg" aria-describedby="nameHelp" placeholder="Enter Url Image" value="{{$data->getUrlImg()}}">
                        <br>
                        <input class="btn btn-success" type="submit" value="Update flower" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
