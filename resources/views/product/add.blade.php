@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    {!! Form::open(['route' => 'product.save', 'files' => true]) !!}
        {!! Form::label('product_name', 'Название товара') !!}
        {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
        {!! Form::label('price', 'Цена') !!}
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
        {!! Form::label('quantity', 'Количество') !!}
        {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
        {!! Form::label('image', 'Изображение') !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
        {!! Form::label('description', 'Описание') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
        {!! Form::hidden('user_id', Auth::user()->id)!!}
        <br>
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection