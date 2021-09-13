@extends('layouts.app')

@section('title') {{'Create Combo'}} @endsection

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
        <h1 class="masthead-heading text-uppercase mb-0">Create a Combo</h1>
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
                <form method="POST" action="{{ route('combo.save') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{old('name')}}">
                        
                        <label for="exampleInputBouquetType">Bouquet Type</label>
                        <input type="text" class="form-control" name="bouquetType" aria-describedby="nameHelp" placeholder="Enter Boquet Type" value="{{old('boquetType')}}">
                        
                        <label for="exampleRate">Rate</label>
                        <input type="numeric" class="form-control" name="rate" aria-describedby="numHelp" placeholder="Enter rate" value="{{old('rate')}}">
                        
                        <label for="exampleInputPrice">Price</label>
                        <input type="numeric" class="form-control" name="price" aria-describedby="numHelp" placeholder="Enter price" value="{{old('price')}}">

                        <label for="exampleInputUrlImg">URL Image</label>
                        <input type="text" class="form-control" name="urlImg" aria-describedby="nameHelp" placeholder="Enter URL Image" value="{{old('urlImg')}}">
                        
                        <br>
                        <input class="btn btn-success" type="submit" value="Create combo" />
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
