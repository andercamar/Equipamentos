@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1>Formulario Usuario: <b>{{$user->name or 'Novo'}}</b></h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($user))
                {{Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'class' => 'form'))}}                
            @else
                {{Form::open(array('route' => 'users.store', 'class' => 'form'))}}                
            @endif

                <div class="form-group">
                    {{Form::label('name', 'Nome')}}
                    {{Form::text('name', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('password', 'Senha')}}
                    {{Form::text('password', null, array('class' => 'form-control'))}}
                </div>
                <div class="text-center">
                    {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
                </div>
                {{Form::close()}}
        </div>
    </div>
@stop