@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'product.update', 'files' => true]) !!}
                    {!! Form::label('product_name', 'Название товара') !!}
                    {!! Form::text('product_name', $product->product_name, ['class' => 'form-control']) !!}
                    {!! Form::label('price', 'Цена') !!}
                    {!! Form::number('price', $product->price, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! Form::label('quantity', 'Количество') !!}
                    {!! Form::number('quantity', $product->quantity, ['class' => 'form-control']) !!}
                    <h4>Старое изображение</h4>
                    <img src="/images/products/{{ $product->image }}" alt="" class="img-thumbnail" width="400px" height="400px"/><br/>
                    {!! Form::label('image', 'Изображение') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    {!! Form::label('description', 'Описание') !!}
                    {!! Form::text('description', $product->description, ['class' => 'form-control']) !!}
                    {!! Form::hidden('id', $product->id)!!}
                    <br>
                    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                    <a href="/" type="button" class="btn btn-danger">Отмена</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection