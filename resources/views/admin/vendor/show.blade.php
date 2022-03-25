@extends('adminlte::page')

@section('title', 'Fornecedor')

@section('content_header')
    <h1>Fornecedor: <b>{{$search->vendor_name}} </b></h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <a href="{{route('vendor.create')}}" class="btn btn-primary" data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i></a>
            <a href="{{route('vendor.edit', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
            {{Form::open(array('route' => array('vendor.destroy' ,$search->id), 'class' => 'pull-right'))}}
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
                    <p><b>Nome: </b>{{$search->vendor_name}}</p>
                </li>
            </ul>
        </div>
    </div>
@stop