@extends('layouts.app')

@section('title') {{ __('messages.detailsCandy') }} @endsection

@section('header-title') {{ __('messages.candy') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header"><h3>{{ $data['candy']->getName() }}</h3></div>
                <div class="card-body">
                    <h3>{{ __('messages.name') }}</h3>
                    <p>{{ $data['candy']->getName() }}</p>
                    <h3>{{ __('messages.price') }}</h3>
                    <p>{{ $data['candy']->getPrice() }}</p>
                    <h3>{{ __('messages.image') }}</h3>
                    <img class="img" src="{{ asset('/storage/img/combos/' . $data['candy']->getUrlImg()) }}" />
                </div>
            </div>
        </div>
        </section>
    @endsection
