@extends('layouts.app')

@section('title') {{ __('messages.detailsBouquet') }} @endsection

@section('header-title') {{ __('messages.bouquets') }} @endsection

@section('content')
    <div class="row justify-content-center">
        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3> {{ __('messages.detailsBouquet') }}{{ ' ' }}{{ $data['bouquet']->getName() }}</h3>
                </div>
                <div class="card-body">
                    <h3> {{ __('messages.bouquetType') }}</h3>
                    <p>{{ $data['bouquet']->getBouquetType() }}</p>
                    <h3> {{ __('messages.rate') }}</h3>
                    <p>{{ $data['bouquet']->getRate() }}</p>
                    <h3> {{ __('messages.price') }}</h3>
                    <p>{{ $data['bouquet']->getPrice() }}</p>
                    <h3>{{ __('messages.image') }}</h3>
                    <img class="img"
                        src="{{ asset('/storage/img/combos/' . $data['bouquet']->getUrlImg()) }}" />
                    <h3>{{ __('messages.flower') }}</h3>
                    <ul>
                        @foreach ($data['flowers'] as $flower)
                            <li>{{ $flower->getName() }}</li>
                        @endforeach
                    </ul>
                    <h3>{{ __('messages.candy') }}</h3>
                    <ul>
                        @foreach ($data['candies'] as $candy)
                            <li>{{ $candy->getName() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        </section>
    @endsection
