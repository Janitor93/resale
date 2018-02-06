@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="dropdown sorting-product float-right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Сортировка
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="/?sort=product_name">По имени</a></li>
                    <li><a href="/?sort=price">По цене</a></li>
                    <li><a href="/?sort=created_at">По дате добавления</a></li>
                </ul>
            </div>
        </div>
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="panel panel-success item">
                <div class="text-center">
                    <h4 class="product-name"><a href="/product/{{ $product->id }}">{{ $product->product_name }}</a></h4>
                    <hr class="line">
                    <div class="icon">
                        <a href="/product/{{ $product->id }}"><img src="images/products/{{ $product->image }}" alt="" class="img-thumbnail" width="200px" height="200px"/></a>
                    </div>
                    <hr class="line">
                    <div class="buy-info">
                        <span class="text-left price">Цена: {{ $product->price }} бел.р.</span>
                        {{--<a href="#" onclick="event.preventDefault()" class="btn btn-success text-rigth buy-btn" id="{{ $product->id }}">Купить</a>--}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="text-center">
            {!! $products->render() !!}
        </div>
    </div>
</div>

@endsection