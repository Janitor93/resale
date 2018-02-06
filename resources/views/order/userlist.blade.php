@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($orders->count() > 0)
                @foreach($orders as $order)
                    <div class="jumbotron">
                        <h1>{{ $order->product_name }}</h1>
                        <p>Количество: {{ $order->quantity }}</p>
                        <p>Цена за единицу: {{ $order->price }} бел. руб.</p>
                        <p>Всего: {{ $order->price * $order->quantity }} бел. руб.</p>
                        {{--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
                    </div>
                @endforeach
                @else
                    <div class="alert alert-warning" role="alert">Вы не делали никаких заказов</div>
                @endif
            </div>
        </div>
    </div>
@endsection