@extends('adminlte::page')

@section('title', 'Fabricante')

@section('content_header')
    <h1>Formulario fabricante: <b>{{$search->manufacturer_name or 'Novo'}}</b></h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('manufacturer.update', $search->id), 'method'=>'PUT', 'class' => 'form')) }}
            @else
                {{Form::open(array('route' => 'manufacturer.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            {{Form::label('manufacturer_name', 'Nome')}}
                            {{Form::text('manufacturer_name', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
                        </div>
                    </div>
        </div>
        <div class="box-footer">
                <div class="text-center">
                    {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
                </div>
            {{Form::close()}}
        </div>
    </div>
@stop