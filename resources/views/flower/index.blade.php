@extends('layouts.app')

@section('title') {{__('messages.listFlowers')}} @endsection

@section('header-title') {{__('messages.flower')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.listFlowers')}}</h1>
        <div class="card">
            <div class="card-header">{{__('messages.allFlowers')}}</div>
            <div class="card-body">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{route('flower.create')}}">{{__('messages.createFlowers')}}</a>
                  </div>
                <ul>
                    @foreach ($data as $item)
                    <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}</li>
                    <a class="btn btn-success" href="{{route('flower.show',$item->getId())}}">{{__('messages.details')}}</a>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection
