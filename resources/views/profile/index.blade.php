@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Профиль пользователя {{$user->name}}</h3>
            </div>
            <div class="col-md-6">
                <span>Имя: </span>
                @if(!empty($user->first_name))
                    {{$user->first_name}}
                @else
                    Не указано
                @endif
            </div>
            <div class="col-md-6">
                <span>Фамилия: </span>
                @if(!empty($user->last_name))
                    {{$user->last_name}}
                @else
                    Не указано
                @endif
            </div>
            <div class="col-md-6">
                <span>Отчество: </span>
                @if(!empty($user->patronymic))
                    {{$user->patronymic}}
                @else
                    Не указано
                @endif
            </div>
            <div class="col-md-6">
                <span>Телефон: </span>
                @if(!empty($user->phone))
                    {{$user->phone}}
                @else
                    Не указано
                @endif
            </div>
            <div class="col-md-6">
                <span>E-mail: </span>
                @if(!empty($user->email))
                    {{$user->email}}
                @else
                    Не указано
                @endif
            </div>
            <div class="col-md-6">
                <span>Статус: </span>
                @if(!empty($user->role_name))
                    {{$user->role_name}}
                @else
                    Не указано
                @endif
            </div>
            @if(Auth::check() && Auth::user()->id == $user->id)
            <div class="col-md-12">
                <br>
                <a href="{{route('profile.edit', ['id' => $user->id])}}" type="button" class="btn btn-primary">Редактировать</a>
            </div>
            @endif
        </div>
    </div>
@endsection