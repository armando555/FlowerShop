@extends('layouts.app')

@section('title') {{__('messages.panel')}} @endsection

@section('header-title') {{__('messages.panel')}} @endsection

@section('content')

<div class="row justify-content-center">
    
    <br>
    <div class="col-md-8">
        <h1 class="masthead-heading text-uppercase mb-0">{{__('messages.panel')}}</h1>
        @include('util.message')
        


        <div class="card">
            <div class="card-header">{{__('messages.panel')}}</div>
            <div class="card-body">


                {!! $chart->container() !!}


                <script src="{{ $chart->cdn() }}"></script>
                {!! $chart->script() !!}

                <h1>{{__('messages.productsSold')}}</h1>
                <h2 class="text-primary">{{$mostProductSold}}</h2>
                <h2>{{__('messages.user')}}</h2>
                <ul>
                    @if(count($users)!=0)
                        @foreach ($users as $user)
                        <li>{{$user->getName()}}</li>
                        <a class="btn btn-success" href="#">{{__('messages.details')}}</a>
                        <a class="btn btn-danger" href="#">{{__('messages.delete')}}</a>
                        @endforeach
                    @endif
                </ul>
                <h2>{{__('messages.flower')}}</h2>
                <a class="btn btn-primary" href="{{route('flower.create')}}">{{__('messages.createFlowers')}}</a>
                <ul>
                    @if(count($flowers)!=0)
                        @foreach ($flowers as $flower)
                        <li>{{$flower->getName()}}</li>
                        <a class="btn btn-success" href="{{route('flower.show',$flower->getId())}}">{{__('messages.details')}}</a>
                        <a class="btn btn-danger" href="{{route('flower.delete')}}">{{__('messages.delete')}}</a>
                        @endforeach
                    @endif
                </ul>
                <h2>{{__('messages.bouquet')}}</h2>
                <a class="btn btn-primary" href="{{route('bouquet.create')}}">{{__('messages.createBouquet')}}</a>
                <ul>
                    @if(count($bouquets)!=0)
                        @foreach ($bouquets as $bouquet)
                        <li>{{$bouquet->getName()}}</li>
                        <a class="btn btn-success" href="{{route('bouquet.show',$bouquet->getId())}}">{{__('messages.details')}}</a>
                        <a class="btn btn-danger" href="{{route('bouquet.delete')}}">{{__('messages.delete')}}</a>
                        @endforeach
                    @endif
                </ul>
                <h2>{{__('messages.combo')}}</h2>
                <a class="btn btn-primary" href="{{route('combo.create')}}">{{__('messages.createCombo')}}</a>
                <ul>
                    @if (count($combos)!=0)
                        @foreach ($combos as $combo)
                        <li>{{$combo->getName()}}</li>
                        <a class="btn btn-success" href="{{route('combo.show',$combo->getId())}}">{{__('messages.details')}}</a>
                        <a class="btn btn-danger" href="{{route('combo.delete')}}">{{__('messages.delete')}}</a>
                        @endforeach    
                    @endif
                    
                </ul>
                <h2>{{__('messages.candies')}}</h2>
                <a class="btn btn-primary" href="{{route('candy.create')}}">{{__('messages.createCandy')}}</a>
                <ul>
                    @if (count($candies)!=0)
                        @foreach ($candies as $candy)
                        <li>{{$candy->getName()}}</li>
                        <a class="btn btn-success" href="{{route('candy.show',$candy->getId())}}">{{__('messages.details')}}</a>
                        <a class="btn btn-danger" href="{{route('candy.delete')}}">{{__('messages.delete')}}</a>
                        @endforeach
                    @endif
                    
                </ul>
            </div>
        </div>
    </div>
    
</section>
@endsection
