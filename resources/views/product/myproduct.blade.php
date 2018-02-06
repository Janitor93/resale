@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @if($products->count() > 0)
                    @foreach($products as $product)
                        <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                            <li class="list-group-item">
                                <span class="badge">{{ $product->quantity }}</span>
                                {{ $product->product_name }}
                            </li>
                        </a>
                    @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">Вы не добавляли никаких товаров</div>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection