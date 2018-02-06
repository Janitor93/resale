@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/products/{{ $product->image }}" alt="" class="img-thumbnail" width="400px" height="400px"/>
            </div>
            <div class="col-md-8">
                <p class="product-name">{{ $product->product_name }}</p>
                <p>Цена: <span  class="product-price">{{ $product->price }}</span> бел.р.</p>
                <p>Описание: {{ $product->description }}</p>
                <p>Количество: {{ $product->quantity }}</p>
                <p><a href="{{ route('profile', ['id' => $product->user_id]) }}">Страница продавца</a></p>
                <input type="hidden" class="product-id" value="{{ $product->id }}"/>
                @guest
                @elseif($product->user_id !== Auth::user()->id)
                <div class="wrap-counter">
                    <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-danger btn-number quantity-minus"  data-type="minus" data-field="quant[2]">
                              <span class="glyphicon glyphicon-minus"></span>
                          </button>
                      </span>
                            <input type="text" name="quant[2]" class="form-control input-number product-counter" value="1" min="1" max="{{$product->quantity}}">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-number quantity-plus" data-type="plus" data-field="quant[2]">
                              <span class="glyphicon glyphicon-plus"></span>
                          </button>
                      </span>
                    </div>
                    <br/>
                    <a href="#" class="btn btn-primary btn-success buy-btn">Купить</a>
                </div>
                @endguest

            </div>
            <div class="order-result"></div>
        </div>
    </div>

@endsection