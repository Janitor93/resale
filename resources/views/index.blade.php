@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="list-group col-sm-2 col-xs-12">
            <a href="#" class="list-group-item">1</a>
            <a href="#" class="list-group-item">2</a>
            <a href="#" class="list-group-item">3</a>
            <a href="#" class="list-group-item">4</a>
            @if(Auth::guest())
            @elseif(Auth::user()->role_id === Config::get('constants.adminRoleId'))
                <a href="#" class="list-group-item">Добавить категорию</a>
            @endif
        </div>
    </div>
</div>

@endsection