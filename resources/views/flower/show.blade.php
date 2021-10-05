@extends('layouts.app')

@section('title') {{ __('messages.details') }} @endsection

@section('header-title') {{ __('messages.flower') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0">{{ $data['flower']->getName() }}</h1>
            <div class="card">
                <div class="card-header">{{ __('messages.details') }}</div>
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
                    @can('flower.edit')
                        <a href="{{ route('flower.edit', $data['flower']->getId()) }}"
                            class="btn btn-success">{{ __('messages.edit') }}</a>
                        <a href="{{ route('flower.delete', $data['flower']->getId()) }}"
                            class="btn btn-danger">{{ __('messages.delete') }}</a>
                    @endcan

                    <h3>{{ __('messages.image') }}</h3>
                    <img class="img imagen-items" src="{{ asset('/storage/img/combos/' . $data['flower']->getUrlImg()) }}" />


                </div>
            </div>
        </div>
        </section>
    @endsection
