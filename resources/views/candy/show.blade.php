@extends('layouts.app')

@section('title') {{ __('messages.detailsCandy') }} @endsection

@section('header-title') {{ __('messages.candy') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('detailsCandy', $data['candy']) }}
        </div>
    </div>


    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.detailsCombo') }}{{ ' ' }}{{ $data['candy']->getName() }}</h3>
                </div>
                <div class="card-body">
                    <img class="img imagen-items"
                        src="{{ asset('/storage/img/combos/' . $data['candy']->getUrlImg()) }}" />
                    <h6>{{ __('messages.name') }}</h6>
                    <p>{{ $data['candy']->getName() }}</p>
                    <h6>{{ __('messages.price') }}</h6>
                    <p>{{ $data['candy']->getPrice() }}</p>


                    <div class="btn-group margin-top" role="group" aria-label="Basic example">
                        @can('candy.edit')
                            <a href="{{ route('candy.edit', $data['candy']->getId()) }}"
                                class="btn btn-success">{{ __('messages.edit') }}</a>
                        @endcan
                        <a href="{{ route('candy.delete', $data['candy']->getId()) }}"
                            class="btn btn-danger">{{ __('messages.delete') }}</a>
                    </div>
                </div>
            </div>
        </div>
        </section>
    @endsection
