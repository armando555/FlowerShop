@extends('layouts.app')

@section('title') {{ __('messages.cart') }} @endsection

@section('header-title') {{ __('messages.cart') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('cart') }}
        </div>
    </div>

    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0"></h1>
            @include('util.message')
            <div class="card margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.cart') }}</h3>
                </div>
                <div class="card-body ">




                    @if (!is_null($data) && isset($data['flowers']))
                        @if (count($data['flowers']) > 0)
                            <h3>{{ __('messages.flower') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['flowers'] as $item)
                                    <li class="card card-item card-item-cart">

                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityFlower[$item->getId()] }}
                                            </label>
                                            <a class="btn btn-success"
                                                href="{{ route('flower.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>

                        @endif
                    @endif
                    @if (!is_null($data) && isset($data['bouquets']))
                        @if (count($data['bouquets']) > 0)
                            <h3>{{ __('messages.bouquet') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['bouquets'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityBouquet[$item->getId()] }}</label>
                                            <a class="btn btn-success"
                                                href="{{ route('bouquet.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                    @if (!is_null($data) && isset($data['combos']))
                        @if (count($data['combos']) > 0)
                            <h3>{{ __('messages.combo') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['combos'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">

                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityCombo[$item->getId()] }}</label>
                                            <a class="btn btn-success"
                                                href="{{ route('combo.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>


                                @endforeach
                            </ul>
                        @endif
                    @endif
                    @if (!is_null($data) && isset($data['candies']))
                        @if (count($data['candies']) > 0)
                            <h3>{{ __('messages.candy') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['candies'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getName() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityCandy[$item->getId()] }}</label>
                                            <a class="btn btn-success"
                                                href="{{ route('candy.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        @endif
                    @endif

                    <h5>{{ __('messages.total') }} : {{ $acu }}$</h5>
                    <form method="POST" action="{{ route('cart.buy') }}">
                        @csrf
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-info">{{ __('messages.buy') }}</button>
                            <a class="btn btn-danger"
                                href="{{ route('cart.delete') }}">{{ __('messages.cartDelete') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
    @endsection
