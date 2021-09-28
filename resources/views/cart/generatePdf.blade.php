@extends('layouts.app')

@section('title') {{__('messages.generatePdf')}} @endsection

@section('header-title') {{__('messages.generatePdf')}} @endsection

@section('content')
<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.generatePdf')}}</h1>
        @include('util.message')
        <div class="card">
            <div class="card-header">{{__('messages.generatePdf')}}</div>
            <div class="card-body">
                <h1>{{$order->getTotal()}}</h1>
            </div>
                
        </div>
    </div>
</section>
@endsection
