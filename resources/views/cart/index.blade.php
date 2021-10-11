@extends('layouts.app')

@section('title') {{ __('messages.cart') }} @endsection

@section('header-title') {{ __('messages.cart') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.cart') }}</h1>
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('messages.cartItems') }}</div>
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-danger" href="{{ route('cart.delete') }}">{{ __('messages.cartDelete') }}</a>
                    </div>
                    <form method="POST" action="{{ route('cart.buy') }}">
                        @csrf
                        <br>
                        <button type="submit" class="btn btn-info">{{ __('messages.buy') }}</button>
                        @if (!is_null($data) && isset($data['flowers']))
                            @if (count($data['flowers']) > 0)
                                <h3>{{ __('messages.flower') }}</h3>
                                <ul>
                                    @foreach ($data['flowers'] as $item)
                                        <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}
                                        </li>
                                        <a class="btn btn-success"
                                            href="{{ route('flower.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}:
                                            {{ $quantityFlower[$item->getId()] }}</label>
                                    @endforeach
                                </ul>

                            @endif
                        @endif
                        @if (!is_null($data) && isset($data['bouquets']))
                            @if (count($data['bouquets']) > 0)
                                <h3>{{ __('messages.bouquet') }}</h3>
                                <ul>
                                    @foreach ($data['bouquets'] as $item)
                                        <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}
                                        </li>
                                        <a class="btn btn-success"
                                            href="{{ route('bouquet.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}:
                                            {{ $quantityBouquet[$item->getId()] }}</label>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                        @if (!is_null($data) && isset($data['combos']))
                            @if (count($data['combos']) > 0)
                                <h3>{{ __('messages.combo') }}</h3>
                                <ul>
                                    @foreach ($data['combos'] as $item)
                                        <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}
                                        </li>
                                        <a class="btn btn-success"
                                            href="{{ route('combo.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}:
                                            {{ $quantityCombo[$item->getId()] }}</label>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                        @if (!is_null($data) && isset($data['candies']))
                            @if (count($data['candies']) > 0)
                                <h3>{{ __('messages.candy') }}</h3>
                                <ul>
                                    @foreach ($data['candies'] as $item)
                                        <li>{{ $item->getId() }} - {{ $item->getName() }} : {{ $item->getPrice() }}
                                        </li>
                                        <a class="btn btn-success"
                                            href="{{ route('candy.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}:
                                            {{ $quantityCandy[$item->getId()] }}</label>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                    </form>
                    <h1>{{ __('messages.total') }} : {{ $acu }}</h1>
                </div>
            </div>
        </div>
        </section>
    @endsection
