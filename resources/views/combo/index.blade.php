@extends('layouts.app')

@section('title') {{'List of combos'}} @endsection

@section('header-title') {{'combo'}} @endsection

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
    .img{
        width: 500px;
        height: 350px;

    }
</style>


<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">List of Combos</h1>
        <div class="card">
            <div class="card-header">These are all our combos</div>
            <div class="card-body">
                <ul>
                    @foreach ($data as $combo)
                    <li>{{ $combo->getId() }} - {{ $combo->getName() }} : {{ $combo->getPrice() }}
                    <img class="img" src="{{asset($combo->getUrlImg())}}"/>
                    </li>
                    <a class="btn btn-success" href="{{route('combo.show',$combo->getId())}}">details</a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
</section>
@endsection
