@extends('adminlte::page')

@section('title', 'Software')

@section('content_header')
    <h1>Formulario Software</h1>
@stop

@section('content')<div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('software.update', $search->id), 'method' => 'PUT', 'class' => 'form'))}}
            @else
                {{Form::open(array('route' => 'software.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            {{Form::label('software_name', 'Nome')}}
                            {{Form::text('software_name',null, array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            {{Form::label('software_version', 'Versão')}}
                            {{Form::text('software_version',null, array('class' => 'form-control', 'placeholder' => 'Versão'))}}
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="text-center">
                            {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
                        </div>
                    </div>
                {{Form::close()}}
        </div>
    </div>
@stop
