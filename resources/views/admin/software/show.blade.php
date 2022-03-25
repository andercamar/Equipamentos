@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="box box-info">
    <div class="box-header">
        <a href="{{route('software.create')}}" class="btn btn-primary" data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i></a>
        <a href="{{route('software.edit', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
        {{-- {{Form::open(array('route' => array('software.destroy' ,$search->id), 'class' => 'pull-right'))}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::button('<i class="fa fa-trash"></i>', array('class' => 'btn btn-danger', 'type' => 'submit'))}}
        {{Form::close()}} --}}
    </div>
    <div class="box-body">
        <ul class="list-group text-center">
            <li class="list-group-item">
                <p><b>Codigo: </b>{{$search->id}}</p>
            </li>
            <li class="list-group-item">
                <p><b>Tipo: </b>{{$search->software_name}}</p>
            </li>
            <li class="list-group-item">
                <p><b>Modelo: </b>{{$search->software_version}}</p>
            </li>
            <li class="list-group-item">
                <p><b>Criado em: </b>{{$search->created_at}}</p>
            </li>
            <li class="list-group-item">
                <p><b>Atualizado em: </b>{{$search->updated_at}}</p>
            </li>
        </ul>
    </div>
</div>
@stop
