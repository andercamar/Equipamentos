@extends('adminlte::page')

@section('title', 'Modelos')

@section('content_header')
    <h1>Formulario Modelo: <b>{{$search->model_nome or 'Novo'}}</b></h1>
@stop
@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('model.update', $search->id), 'method' => 'PUT', 'class' => 'form'))}}
            @else
                {{Form::open(array('route' => 'model.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            {{Form::label('model_type', 'Tipo')}}
                            {{Form::select('model_type',$type, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('model_name', 'Nome')}}
                            {{Form::text('model_name', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('manufacturer_id', 'Fabricante')}}
                            {{Form::select('manufacturer_id', $manufacturer, null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
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