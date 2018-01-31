@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Личные данные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Пароль</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade in active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-md-12">
                        <h3>Форма регистрации профиля</h3>
                        {!! Form::open(['route' => ['profile.edit.info', $user->id]]) !!}
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                        {!! Form::label('first_name', 'Имя') !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                        {!! Form::label('last_name', 'Фамилия') !!}
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                        {!! Form::label('patronymic', 'Отчетсво') !!}
                        {!! Form::text('patronymic', $user->patronymic, ['class' => 'form-control']) !!}
                        {!! Form::label('phone', 'Телефон') !!}
                        {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                        <a href="{{route('profile', ['id' => $user->id])}}" type="button" class="btn btn-danger">Отмена</a>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <div class="col-md-12">
                        <h3>Смена пароля</h3>
                        {!! Form::open(['route' => ['profile.edit.password', $user->id]]) !!}
                        {!! Form::label('old_password', 'Старый пароль') !!}
                        {!! Form::password('old_password', ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! Form::label('new_password', 'Новый пароль') !!}
                        {!! Form::password('new_password', ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! Form::label('new_password_confirmation', 'Подтвердите пароль') !!}
                        {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                        <br>
                        {!! Form::submit('Изменить пароль', ['class' => 'btn btn-primary']) !!}
                        <a href="{{route('profile', ['id' => $user->id])}}" type="button" class="btn btn-danger">Отмена</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div><br>
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
@stop