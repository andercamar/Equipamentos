@extends('adminlte::page')

    @section('title', 'Senhas')

@section('content_header')
    <h1 class="title">Formulario Senha: <b>{{$senha->portal or 'Nova'}}</b></h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">

            @if (isset($senha))
                {{Form::model($senha, array('route' => array('password.update', $senha->id), 'method'=>'PUT', 'class' => 'form')) }}
            @else
                {{Form::open(array('route' => 'password.store', 'class' => 'form'))}}
            @endif
            
                <div class="form-group">
                    {{Form::label('portal', 'Portal')}}
                    {{Form::text('portal', null, array('class' => 'form-control'))}}
                </div> 
                <div class="form-group">
                    {{Form::label('usuario', 'Usuario')}}
                    {{Form::text('usuario', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('senha', 'Senha')}}
                    {{Form::text('senha', null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('exclusao', 'Ativo')}}
                    @if (isset($senha) and $senha->exclusao == 1)
                        {{Form::checkbox('exclusao', '1', false)}}
                    @else
                        {{Form::checkbox('exclusao', '0', true)}}
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('descricao', 'Descricao')}}
                    {{Form::textarea('descricao', null, array('class' => 'form-control', 'rows' => '3'))}}
                </div>
                <div class="form-group">
                    {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
                </div>
            {{Form::close()}}
        </div>
    </div>
@stop