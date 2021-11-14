@extends('layouts.app')

@section('title') {{ __('messages.courses') }} @endsection

@section('header-title') {{ __('messages.courses') }} @endsection

@section('content')
<section>
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            @include('util.message')
            <div class="card margin-top margin-bottom">

                <div class="card-header">
                    <h3> {{ __('messages.listCourses') }}</h3>
                </div>
                <div class="card-body">
                    <ul class="ul-list">
                        @foreach ($data['courses'] as $item)
                            <li class="card card-item ">
                                <h5 class="card-header"> {{ $item['title'] }}</h5>
                                <div class="card-body card-item-cart">

                                    <img class="img imagen-items"
                                        src="{{ $item['image'] }}" />
                                    <ul>
                                        
                                        <li><b>{{ __('messages.price') }} :</b> {{$item['price']}}</li>
                                        <li><b>{{ __('messages.summary') }}:</b> {{$item['summary']}}</li>
                                    </ul>                                                                        

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
