@extends('adminlte::page')

@section('title', 'Modelo')

@section('content_header')
    <h1>Modelo: <b>{{$search->model_name}} </b></h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <a href="{{route('model.create')}}" class="btn btn-primary" data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i></a>
            <a href="{{route('model.edit', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
            {{Form::open(array('route' => array('model.destroy' ,$search->id), 'class' => 'pull-right'))}}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::button('<i class="fa fa-trash"></i>', array('class' => 'btn btn-danger', 'type' => 'submit'))}}
            {{Form::close()}}
        </div>
        <div class="box-body">
            <ul class="list-group text-center">
                <li class="list-group-item">
                    <p><b>Codigo: </b>{{$search->id}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Nome: </b>{{$search->model_name}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Tipo: </b>{{$search->model_type}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Fabricante: </b>{{$search->manufacturers->manufacturer_name}}</p>
                </li>
            </ul>
        </div
    </div>
@stop