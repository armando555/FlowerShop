@extends('layouts.app')

@section('title') {{ __('messages.details') }} @endsection

@section('header-title') {{ __('messages.flower') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.details') }}{{ ' ' }} {{$data['flower']->getName()}}</h3>
                </div>
                <div class="card-body">
                    <h3>{{ __('messages.spice') }}</h3>
                    <p>{{ $data['flower']->getSpice() }}</p>
                    <h3>{{ __('messages.amountPerFlower') }}</h3>
                    <p>{{ $data['flower']->getAmountPerFlower() }}</p>
                    <h3>{{ __('messages.color') }}</h3>
                    <p>{{ $data['flower']->getColor() }}</p>
                    <h3>{{ __('messages.description') }}</h3>
                    <p>{{ $data['flower']->getDescription() }}</p>
                    <h3>{{ __('messages.price') }}</h3>
                    <p>{{ $data['flower']->getPrice() }}</p>
                    <h3>{{ __('messages.image') }}</h3>
                    <img class="img"
                        src="{{ asset('/storage/img/combos/' . $data['flower']->getUrlImg()) }}" />
                </div>
            </div>
        </div>
        </section>
    @endsection
