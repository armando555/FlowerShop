@extends('layouts.app')

@section('title') {{ __('messages.cart') }} @endsection

@section('header-title') {{ __('messages.cart') }} @endsection

@section('content')

    <div class="center">
        <div class="bread-crumbs-container">
            {{ Breadcrumbs::render('cart') }}
        </div>
    </div>

    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <h1 class="masthead-heading text-uppercase mb-0"></h1>
            @include('util.message')
            <div class="card margin-bottom">
                <div class="card-header">
                    <h3>{{ __('messages.cart') }}</h3>
                </div>
                <div class="card-body ">




                    @if (!is_null($data) && isset($data['flowers']))
                        @if (count($data['flowers']) > 0)
                            <h3>{{ __('messages.flower') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['flowers'] as $item)
                                    <li class="card card-item card-item-cart">

                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityFlower[$item->getId()] }}
                                            </label>
                                            <a class="btn btn-success"
                                                href="{{ route('flower.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>

                        @endif
                    @endif
                    @if (!is_null($data) && isset($data['bouquets']))
                        @if (count($data['bouquets']) > 0)
                            <h3>{{ __('messages.bouquet') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['bouquets'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityBouquet[$item->getId()] }}</label>
                                            <a class="btn btn-success"
                                                href="{{ route('bouquet.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                    @if (!is_null($data) && isset($data['combos']))
                        @if (count($data['combos']) > 0)
                            <h3>{{ __('messages.combo') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['combos'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">

                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityCombo[$item->getId()] }}</label>
                                            <a class="btn btn-success"
                                                href="{{ route('combo.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>


                                @endforeach
                            </ul>
                        @endif
                    @endif
                    @if (!is_null($data) && isset($data['candies']))
                        @if (count($data['candies']) > 0)
                            <h3>{{ __('messages.candy') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($data['candies'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <img class="img imagen-items"
                                            src="{{ asset('/storage/img/combos/' . $item->getUrlImg()) }}" />
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getName() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.quantity') }}:
                                                {{ $quantityCandy[$item->getId()] }}</label>
                                            <a class="btn btn-success"
                                                href="{{ route('candy.show', $item->getId()) }}">{{ __('messages.details') }}</a>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        @endif
                    @endif

                    <h5>{{ __('messages.total') }} : {{ $acu }}$</h5>

                    <div class="card-body ">
                        <script
                                                src="https://www.paypal.com/sdk/js?client-id=AeY5CtEIhgzel5BnloTMMrGnPoZK-i_9PwJscOhe2xgDzYZvEh-hZYLBLKPJVSctcyrZCh11aZX2RHp2&currency=USD&components=buttons,funding-eligibility">
                        </script>

                        <!-- Set up a container element for the button -->
                        <div id="paypal-button-container"></div>

                        <script>
                            paypal.Buttons({
                                fundingSource: paypal.FUNDING.CARD,
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        application_context: {
                                            shipping_preference: "NO_SHIPPING"
                                        },
                                        payer: {
                                            address: {
                                                country_code: "CO"
                                            }
                                        },
                                        purchase_units: [{
                                            amount: {
                                                value: {{ round($acu / 3800, 2) }} // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                                            }
                                        }]
                                    });
                                },
                                // Finalize the transaction after payer approval
                                onApprove: function(data, actions) {
                                    return fetch('/cart/process/' + data.orderID)
                                    method: 'post'
                                        .then(red => res.json())
                                        .then(function(orderData) {
                                            var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                                            if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                                                return actions.restart(); // Recoverable state, per:
                                                // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                                            }

                                            if (errorDetail) {
                                                var msg = 'Sorry, your transaction could not be processed.';
                                                if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                                                if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                                                return alert(
                                                    msg
                                                ); // Show a failure message (try to avoid alerts in production environments)
                                            }

                                            // Successful capture! For demo purposes:
                                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                            var transaction = orderData.purchase_units[0].payments.captures[0];
                                            alert('Transaction ' + transaction.status + ': ' + transaction.id +
                                                '\n\nSee console for all available details');

                                            // Replace the above to show a success message within this page, e.g.
                                            // const element = document.getElementById('paypal-button-container');
                                            // element.innerHTML = '';
                                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                            // Or go to another URL:  actions.redirect('thank_you.html');
                                        });
                                },
                                onError: function(err) {
                                    console.log(err);
                                }
                            }).render('#paypal-button-container');
                        </script>
                    </div>

                    <form method="POST" action="{{ route('cart.buy') }}">
                        @csrf
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-info">{{ __('messages.buy') }}</button>
                            <a class="btn btn-danger"
                                href="{{ route('cart.delete') }}">{{ __('messages.cartDelete') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
