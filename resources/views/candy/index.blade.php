@extends('layouts.app')

@section('title') {{ __('messages.listCandy') }} @endsection

@section('header-title') {{ __('messages.candies') }} @endsection



@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.listCandy') }}</h1>
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('messages.allCandy') }}</div>
                <div class="card-body">
                    @can('candy.create')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary"
                                href="{{ route('candy.create') }}">{{ __('messages.createCandy') }}</a>
                        </div>
                    @endcan
                    <ul class="ul-list">
                        @foreach ($data['candies'] as $candy)
                            <li class="card card-item">
                                <h5 class="card-header">{{ $candy->getName() }} 
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
