@extends('layouts.app')

@section('title') {{ __('messages.generatePdf') }} @endsection

@section('header-title') {{ __('messages.generatePdf') }} @endsection

@section('content')


    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('bill') }}
        </div>
    </div>

    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            @include('util.message')
            <div class="card margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.generatePdf') }}</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-warning"
                        href="{{ route('cart.generatePdf', $order->getId()) }}">{{ __('messages.generatePdf') }}</a>
                    <a class="btn btn-info" href="#">{{ __('messages.generateExcel') }}</a>
                    <div class="container">
                        <h1 align="center"> {{ __('messages.generatePdf') }}</h1>
                        <div class="row">
                            <div class="col-md-7" align="right">
                                <h4>{{ __('messages.customerData') }}</h4>
                            </div>
                            <div class="col-md-7" align="right">

                            </div>

                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.address') }}</th>
                                        <th>{{ __('messages.email') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $user->getName() }}</td>
                                    <td>{{ $user->getAddress() }}</td>
                                    <td>{{ $user->getEmail() }}</td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </section>
    @endsection
