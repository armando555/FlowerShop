@extends('layouts.app')

@section('title') {{ __('messages.detailsCombo') }} @endsection

@section('header-title') {{ __('messages.combo') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('detailsCombo', $data['combo']) }}
        </div>
    </div>


    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.detailsCombo') }}{{ ' ' }}{{ $data['combo']->getName() }}</h3>
                </div>
                <div class="card-body">
                    <img class="img imagen-items"
                        src="{{ asset('/storage/img/combos/' . $data['combo']->getUrlImg()) }}" />
                    <h3>{{ __('messages.name') }}</h3>
                    <p>{{ $data['combo']->getName() }}</p>
                    <h3>{{ __('messages.bouquetType') }}</h3>
                    <p>{{ $data['combo']->getBouquetType() }}</p>
                    <h3>{{ __('messages.rate') }}</h3>
                    <p>{{ $data['combo']->getRate() }}</p>
                    <h3>{{ __('messages.price') }}</h3>
                    <p>{{ $data['combo']->getPrice() }}$</p>
                    <h3>{{ __('messages.image') }}</h3>
                    @can('combo.edit')
                        <a href="{{ route('combo.edit', $data['combo']->getId()) }}"
                            class="btn btn-success">{{ __('messages.edit') }}</a>
                        <a href="{{ route('combo.delete', $data['combo']->getId()) }}"
                            class="btn btn-danger">{{ __('messages.delete') }}</a>
                    @endcan
                    <h3>{{ __('messages.flower') }}</h3>
                    <ul>
                        @foreach ($data['flowers'] as $flower)
                            <li>{{ $flower->getName() }}</li>
                        @endforeach
                    </ul>
                    <h3>{{ __('messages.candies') }}</h3>
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
