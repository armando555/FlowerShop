@extends('layouts.app')

@section('title') {{ __('messages.details') }} @endsection

@section('header-title') {{ __('messages.flower') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('detailsFlower', $data['flower']) }}
        </div>
    </div>


    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.details') }}{{ ' ' }}{{ $data['flower']->getName() }}</h3>
                </div>

                <div class="card-body">
                    <img class="img imagen-items"
                        src="{{ asset('/storage/img/combos/' . $data['flower']->getUrlImg()) }}" />
                    <h6>{{ __('messages.spice') }}</h6>
                    <p>{{ $data['flower']->getSpice() }}</p>
                    <h6>{{ __('messages.amountPerFlower') }}</h6>
                    <p>{{ $data['flower']->getAmountPerFlower() }}</p>
                    <h6>{{ __('messages.color') }}</h6>
                    <p>{{ $data['flower']->getColor() }}</p>
                    <h6>{{ __('messages.description') }}</h6>
                    <p>{{ $data['flower']->getDescription() }}</p>
                    <h6>{{ __('messages.price') }}</h6>
                    <p>{{ $data['flower']->getPrice() }}$</p>

                    <div class="btn-group margin-top" role="group" aria-label="Basic example">
                    </div>

                </div>
            </div>
        </div>
        </section>
    @endsection
