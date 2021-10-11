@extends('layouts.app')

@section('title') {{ __('messages.detailsCandy') }} @endsection

@section('header-title') {{ __('messages.candy') }} @endsection

@section('content')
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.detailsCombo') }}{{ ' ' }}{{ $data['candy']->getName() }}</h3>
                </div>
                <div class="card-body">
                    <h6>{{ __('messages.name') }}</h6>
                    <p>{{ $data['candy']->getName() }}</p>
                    <h6>{{ __('messages.price') }}</h6>
                    <p>{{ $data['candy']->getPrice() }}</p>
                    <h6>{{ __('messages.image') }}</h6>
                    <img class="img imagen-items" src="{{ asset('/storage/img/combos/' . $data['candy']->getUrlImg()) }}" />
                    @can('candy.edit')
                        <a href="{{ route('candy.edit', $data['candy']->getId()) }}"
                            class="btn btn-success">{{ __('messages.edit') }}</a>
                        <a href="{{ route('candy.delete', $data['candy']->getId()) }}"
                            class="btn btn-danger">{{ __('messages.delete') }}</a>
                    @endcan
                </div>
            </div>
        </div>
        </section>
    @endsection
