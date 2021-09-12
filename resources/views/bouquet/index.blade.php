@extends('layouts.app')

@section('title') {{'List of bouquets'}} @endsection

@section('header-title') {{'Bouquet'}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">List of bouquets</h1>
        <div class="card">
            <div class="card-header">These are all the bouquets in the store</div>
            <div class="card-body">
                <ul>
                    @foreach ($data as $item)
                    <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}</li>
                    <a class="btn btn-success" href="{{route('flower.show',$item->getId())}}">details</a>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection