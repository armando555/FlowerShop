@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">
        <img src="{{ asset('/img/portfolio/flowershop.jpeg') }}">
    </div>

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 38rem; margin-bottom: 4rem; ">
            <div class="card-body">
                <p class="text-center" style="text-decoration: none; font-size: x-large">{{ __('messages.homeText') }}</p>
            </div>
        </div>
    </div>

@endsection
