@extends('layouts.app')

@section('title') {{ __('messages.listBouquet') }} @endsection

@section('header-title') {{ __('messages.bouquet') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('showBouquet') }}
        </div>
    </div>

    <div class="row justify-content-center">
        <br>
        <div class="col-md-8">
            @include('util.message')

            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.listBouquet') }}</h3>
                </div>
                <div class="card-body">
                    @can('bouquet.create')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary"
                                href="{{ route('bouquet.create') }}">{{ __('messages.createBouquet') }}</a>
                        </div>
                    @endcan
                    <ul class="ul-list">
                        @foreach ($data['bouquet'] as $bouquet)
                            <li class="card card-item">
                                <h5 class="card-header">{{ $bouquet->getName() }}</h5>
                                <div class="card-body card-item-cart">
                                    <img class="img imagen-items"
                                        src="{{ asset('/storage/img/combos/' . $bouquet->getUrlImg()) }}" />

                                    <form class="list-column padding-item" method="POST"
                                        action="{{ route('cart.addBouquet', ['id' => $bouquet->getId()]) }}">
                                        @csrf
                                        <b>
                                            {{ $bouquet->getPrice() }}$
                                        </b>

                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}</label>
                                        <input class="form-control" name="quantity" type="numeric" value="1">

                                        <div class="btn-group margin-top" role="group" aria-label="Basic example">
                                            <button type="submit"
                                                class="btn btn-primary">{{ __('messages.addCart') }}</button>
                                            <a class="btn btn-success"
                                                href="{{ route('bouquet.show', $bouquet->getId()) }}">{{ __('messages.details') }}</a>
                                            <!--<a class="btn btn-primary" href="{{ route('cart.addBouquet', ['id' => $bouquet->getId()]) }}">{{ __('messages.addCart') }}</a>-->
                                        </div>

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
