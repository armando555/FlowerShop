@extends('layouts.app')

@section('title') {{ __('messages.createFlowers') }} @endsection

@section('header-title') {{ __('messages.flower') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('createFlower') }}
        </div>
    </div>


    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">

            @include('util.message')
            <div class="card margin-top margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.createFlowers') }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())

                        <ul id="errors">
                            <h3 class="text-danger">{{ __('messages.errors') }}</h3>
                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    @endif
                    <form method="POST" action="{{ route('flower.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">{{ __('messages.name') }}</label>
                            <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                                placeholder="Enter name" value="{{ old('name') }}">

                            <label for="exampleInputSpice">{{ __('messages.spice') }}</label>
                            <input type="text" class="form-control" name="spice" aria-describedby="nameHelp"
                                placeholder="Enter spice" value="{{ old('spice') }}">

                            <label for="exampleInputAmountPerFlower">{{ __('messages.amountPerFlower') }}</label>
                            <input type="numeric" class="form-control" name="amountPerFlower" aria-describedby="numHelp"
                                placeholder="Enter amount per flower" value="{{ old('amountPerFlower') }}">

                            <label for="exampleInputColor">{{ __('messages.color') }}</label>
                            <input type="text" class="form-control" name="color" aria-describedby="nameHelp"
                                placeholder="Enter color" value="{{ old('color') }}">

                            <label for="exampleInputDescription">{{ __('messages.description') }}</label>
                            <input type="text" class="form-control" name="description" aria-describedby="nameHelp"
                                placeholder="Enter description" value="{{ old('description') }}">

                            <label for="exampleInputPrice">{{ __('messages.price') }}</label>
                            <input type="numeric" class="form-control" name="price" aria-describedby="numHelp"
                                placeholder="Enter price" value="{{ old('price') }}">

                            <div class="mb-3 mt-2">
                                <label for="formFile" class="form-label">{{ __('messages.image') }}</label>
                                <input class="form-control" type="file" id="formFile" value="{{ old('urlImg') }}"
                                    name="urlImg">
                            </div>
                            <br>
                            <input class="btn btn-success" type="submit" value="{{ __('messages.createFlowers') }}" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
