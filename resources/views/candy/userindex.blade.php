@extends('layouts.app')

@section('title') {{ __('messages.listCandy') }} @endsection

@section('header-title') {{ __('messages.candies') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">

            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.listCandy') }}</h3>
                </div>
                <div class="card-body">
                    <ul class="ul-list">
                        @foreach ($data['candies'] as $candy)
                            <li class="card card-item">
                                <h5 class="card-header">
                                    {{ $candy->getName() }}
                                </h5>
                                <div class="card-body card-content">
                                    <b>
                                        {{ $candy->getPrice() }}$
                                    </b>
                                    <img class="img imagen-items"
                                        src="{{ asset('/storage/img/combos/' . $candy->getUrlImg()) }}" />
                                    <a class="btn btn-success"
                                        href="{{ route('candy.show', $candy->getId()) }}">{{ __('messages.details') }}</a>
                                    <!--<a class="btn btn-primary" href="{{ route('cart.addCandy', ['id' => $candy->getId()]) }}">{{ __('messages.addCart') }}</a>-->
                                    <form method="POST" action="{{ route('cart.addCandy', ['id' => $candy->getId()]) }}">
                                        @csrf
                                        <label for="exampleInputName"
                                            class="font-weight-bold">{{ __('messages.quantity') }}</label>
                                        <input name="quantity" type="numeric" value="1">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('messages.addCart') }}</button>
                                </div>
                            </li>
                            </form>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        </section>
    @endsection
