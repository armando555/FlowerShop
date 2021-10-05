@extends('layouts.app')

@section('title') {{ __('messages.listFlowers') }} @endsection

@section('header-title') {{ __('messages.flower') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.listFlowers') }}</h1>
            <div class="card">
                <div class="card-header">{{ __('messages.allFlowers') }}</div>
                <div class="card-body">
                    <ul class="ul-list">
                        @foreach ($data['flowers'] as $item)
                            <li class="card card-item">
                                <h5 class="card-header"> {{ $item->getName() }}</h5>
                                <div class="card-body card-content">
                                    <b>{{ $item->getPrice() }}$</b>
                                    <img class="img imagen-items"
                                        src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                    <a class="btn btn-success"
                                        href="{{ route('flower.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                    <!--<a class="btn btn-primary" href="{{ route('cart.addFlower', ['id' => $item->getId()]) }}">{{ __('messages.addCart') }}</a>-->
                                    <form method="POST" action="{{ route('cart.addFlower', ['id' => $item->getId()]) }}">
                                        @csrf
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}</label>
                                        <input name="quantity" type="numeric" value="1">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('messages.addCart') }}</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        </section>
    @endsection
