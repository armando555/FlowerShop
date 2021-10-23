@extends('layouts.app')

@section('title') {{ __('messages.detailsBouquet') }} @endsection

@section('header-title') {{ __('messages.bouquets') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('detailsBouquet', $data['bouquet']) }}
        </div>
    </div>


    <div class="row justify-content-center">
        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3> {{ __('messages.detailsBouquet') }}{{ ' ' }}{{ $data['bouquet']->getName() }}</h3>
                </div>
                <div class="card-body">
                    <h6> {{ __('messages.bouquetType') }}</h6>
                    <p>{{ $data['bouquet']->getBouquetType() }}</p>
                    <h6> {{ __('messages.rate') }}</h6>
                    <p>{{ $data['bouquet']->getRate() }}</p>
                    <h6> {{ __('messages.price') }}</h6>
                    <p>{{ $data['bouquet']->getPrice() }}</p>
                    <div class="btn-group margin-top" role="group" aria-label="Basic example">
                        @can('bouquet.edit')
                            <a href="{{ route('bouquet.edit', $data['bouquet']->getId()) }}"
                                class="btn btn-success">{{ __('messages.edit') }}</a>
                        @endcan
                        <a href="{{ route('bouquet.delete', $data['bouquet']->getId()) }}"
                            class="btn btn-danger">{{ __('messages.delete') }}</a>
                    </div>
                    <h6>{{ __('messages.image') }}</h6>
                    <img class="img imagen-items"
                        src="{{ asset('/storage/img/combos/' . $data['bouquet']->getUrlImg()) }}" />
                    <h6>{{ __('messages.flower') }}</h6>
                    <ul>
                        @foreach ($data['flowers'] as $flower)
                            <li>{{ $flower->getName() }}</li>
                        @endforeach
                    </ul>
                    <h6>{{ __('messages.candy') }}</h6>
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
