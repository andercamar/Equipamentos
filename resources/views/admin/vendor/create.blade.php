@extends('adminlte::page')

@section('title', 'Fornecedor')

@section('content_header')
    <h1>Formulario fornecedor: <b>{{$search->vendor_name or 'Novo'}}</b></h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('vendor.update', $search->id), 'method'=>'PUT', 'class' => 'form')) }}
            @else
                {{Form::open(array('route' => 'vendor.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            {{Form::label('vendor_name', 'Nome')}}
                            {{Form::text('vendor_name', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
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