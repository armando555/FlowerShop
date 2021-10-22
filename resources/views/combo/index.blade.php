@extends('layouts.app')

@section('title') {{ __('messages.listCombos') }} @endsection

@section('header-title') {{ __('messages.combo') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('showCombo') }}
        </div>
    </div>

    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.listCombos') }}</h1>
            @include('util.message')
            <div class="card margin-top margin-bottom">
                <div class="card-header">{{ __('messages.allCombos') }}</div>
                <div class="card-body">
                    @can('combo.create')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary"
                                href="{{ route('combo.create') }}">{{ __('messages.createCombo') }}</a>
                        </div>
                    @endcan
                    <ul class="ul-list">
                        @foreach ($data['combos'] as $combo)
                            <li class="card card-item">
                                <h5 class="card-header">
                                    {{ $combo->getName() }}
                                </h5>
                                <div class="card-body card-content">
                                    <b>
                                        {{ $combo->getPrice() }}$
                                    </b>
                                    <img class="img imagen-items"
                                        src="{{ asset('/storage/img/combos/' . $combo->getUrlImg()) }}" />

                                    <a class="btn btn-success"
                                        href="{{ route('combo.show', $combo->getId()) }}">{{ __('messages.details') }}</a>
                                    <!--<a class="btn btn-primary" href="{{ route('cart.addCombo', ['id' => $combo->getId()]) }}">{{ __('messages.addCart') }}</a>-->
                                    <form method="POST" action="{{ route('cart.addCombo', ['id' => $combo->getId()]) }}">
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
