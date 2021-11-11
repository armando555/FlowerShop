@extends('layouts.app')

@section('title') {{ __('messages.listFlowers') }} @endsection

@section('header-title') {{ __('messages.flower') }} @endsection

@section('content')


    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('showFlower') }}
        </div>
    </div>

    <section>
        <div class="row justify-content-center">

            <br>
            <div class="col-md-8">
                @include('util.message')
                <div class="card margin-top margin-bottom">

                    <div class="card-header">
                        <h3> {{ __('messages.listFlowers') }}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="ul-list">
                            @foreach ($data['flowers'] as $item)
                                <li class="card card-item ">
                                    <h5 class="card-header"> {{ $item->getName() }}</h5>
                                    <div class="card-body card-item-cart">

                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />

                                        <form class="list-column padding-item" method="POST"
                                            action="{{ route('cart.addFlower', ['id' => $item->getId()]) }}">
                                            @csrf
                                            <b>{{ $item->getPrice() }}$ </b>

                                            <!--<a class="btn btn-primary" href="{{ route('cart.addFlower', ['id' => $item->getId()]) }}">{{ __('messages.addCart') }}</a>-->
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}</label>
                                            <input class="form-control" name="quantity" type="numeric" value="1">
                                            <div class="btn-group margin-top" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                    href="{{ route('flower.show.user', $item->getId()) }}">{{ __('messages.details') }}</a>
                                                <button type="submit"
                                                    class="btn btn-primary">{{ __('messages.addCart') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
