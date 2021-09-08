@extends('layouts.app')

@section('title') {{'Update Flower'}} @endsection

@section('header-title') {{'Flower'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">Update a flower</h1>
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
                <form method="POST" action="{{ route('flower.update') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data->getId()}}">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{$data->getName()}}">
                        
                        <label for="exampleInputSpice">Spice</label>
                        <input type="text" class="form-control" name="spice" aria-describedby="nameHelp" placeholder="Enter spice" value="{{$data->getSpice()}}">
                        
                        <label for="exampleInputAmountPerFlower">Amount per flower</label>
                        <input type="numeric" class="form-control" name="amountPerFlower" aria-describedby="numHelp" placeholder="Enter amount per flower" value="{{$data->getAmountPerFlower()}}">
                        
                        <label for="exampleInputColor">Color</label>
                        <input type="text" class="form-control" name="color" aria-describedby="nameHelp" placeholder="Enter color" value="{{$data->getColor()}}">
                        
                        <label for="exampleInputDescription">Description</label>
                        <input type="text" class="form-control" name="description" aria-describedby="nameHelp" placeholder="Enter description" value="{{$data->getDescription()}}">
                        
                        <label for="exampleInputPrice">Price</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="Enter price" value="{{$data->getPrice()}}">
                        <br>
                        <input class="btn btn-success" type="submit" value="Update flower" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
