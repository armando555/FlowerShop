@extends('layouts.app')

@section('title') {{'Create Flower'}} @endsection

@section('header-title') {{'Flower'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">Create a flower</h1>
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
                <form method="POST" action="{{ route('flower.save') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{old('name')}}">
                        
                        <label for="exampleInputSpice">Spice</label>
                        <input type="text" class="form-control" name="spice" aria-describedby="nameHelp" placeholder="Enter spice" value="{{old('spice')}}">
                        
                        <label for="exampleInputAmountPerFlower">Amount per flower</label>
                        <input type="numeric" class="form-control" name="amountPerFlower" aria-describedby="numHelp" placeholder="Enter amount per flower" value="{{old('amountPerFlower')}}">
                        
                        <label for="exampleInputColor">Color</label>
                        <input type="text" class="form-control" name="color" aria-describedby="nameHelp" placeholder="Enter color" value="{{old('color')}}">
                        
                        <label for="exampleInputDescription">Description</label>
                        <input type="text" class="form-control" name="description" aria-describedby="nameHelp" placeholder="Enter description" value="{{old('description')}}">
                        
                        <label for="exampleInputPrice">Price</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="Enter price" value="{{old('price')}}">
                        <br>
                        <input class="btn btn-success" type="submit" value="Create flower" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
