@extends('layouts.app')

@section('title') {{ __('messages.listBouquet') }} @endsection

@section('header-title') {{ __('messages.bouquet') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.listBouquet') }}</h1>
            <div class="card">
                <div class="card-header">{{ __('messages.allBouquet') }}</div>
                <div class="card-body">
                    <ul class="ul-list">


                        @foreach ($data['bouquets'] as $bouquet)
                            <li class="card card-item">
                                <h5 class="card-header">{{ $bouquet->getName() }}</h5>
                                <div class="card-body card-content">
                                    <b>
                                        {{ $bouquet->getPrice() }}$
                                    </b>

                                    <img class="img imagen-items"
                                        src="{{ asset('/storage/img/combos/' . $bouquet->getUrlImg()) }}" />
                                    <a class="btn btn-success"
                                        href="{{ route('bouquet.show', $bouquet->getId()) }}">{{ __('messages.details') }}</a>
                                    <!--<a class="btn btn-primary" href="{{ route('cart.addBouquet', ['id' => $bouquet->getId()]) }}">{{ __('messages.addCart') }}</a>-->
                                    <form method="POST"
                                        action="{{ route('cart.addBouquet', ['id' => $bouquet->getId()]) }}">
                                        @csrf
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}</label>
                                        <input name="quantity" type="numeric" value="1">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('messages.addCart') }}</button>
                                    </form>
                                    <div>
                            </li>

                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
        </section>
    @endsection
