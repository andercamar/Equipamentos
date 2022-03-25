@extends('adminlte::page')

@section('title', 'Setor')

@section('content_header')
    <h1>Formulario Setor: <b>{{$search->setor_nome or 'Novo'}}</b></h1>
@stop
@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('departament.update', $search->id), 'method' => 'PUT', 'class' => 'form'))}}
            @else
                {{Form::open(array('route' => 'departament.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            {{Form::label('departament_name', 'Nome')}}
                            {{Form::text('departament_name', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
                        </div>
                    </div>
        </div>
        <div class="box-footer">
            <div class="text-center">
                {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
            </div>
        </div>
            {{Form::close()}}
    </div>
@stop