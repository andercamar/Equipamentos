@extends('adminlte::page')

@section('title', 'Impressoras')

@section('content_header')
    <h1>
        Formulario Impressora: <b>{{$search->printer_name or 'Novo'}}</b>
        <small>Preencher nome da impressora conforme o nome instalado no servidor</small>
    </h1>
@stop
@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('printer.update', $search->id), 'method' => 'PUT', 'class' => 'form'))}}
            @else
                {{Form::open(array('route' => 'printer.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            {{Form::label('printer_name', 'Nome')}}
                            {{Form::text('printer_name', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            {{Form::label('printer_color', 'Impressora Colorida')}}
                            {{Form::select('printer_color',$color, null, array('class' => 'form-control', 'placeholder' => 'Colorida' ))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            {{Form::label('printer_a3', 'Impressora A3')}}
                            {{Form::select('printer_a3',$a3, null, array('class' => 'form-control', 'placeholder' => 'A3' ))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            {{Form::label('printer_value', 'Valor impressão')}}
                            {{Form::number('printer_value',null, array('class' => 'form-control', 'placeholder' => 'Valor','step' => '0.001'))}}
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