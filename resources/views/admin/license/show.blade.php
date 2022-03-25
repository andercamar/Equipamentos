@extends('adminlte::page')

@section('title', 'Licença')

@section('content_header')
    <h1>Licença</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <a href="{{route('license.create')}}" class="btn btn-primary" data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i></a>
            <a href="{{route('license.edit', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
            @if ($search->license_active == 1)
                <a href="{{route('license.deactive', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Desativar"><i class="fa fa-close"></i></a>
            @else  
                <a href="{{route('license.active', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Ativar"><i class="fa fa-check"></i></a>
            @endif
        </div>
        <div class="box-body">
            <ul class="list-group text-center">
                <li class="list-group-item">
                    <p><b>Codigo: </b>{{$search->id}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Tipo: </b>{{$search->license_type}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Nome: </b>{{$search->license_name}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Versão: </b>{{$search->license_version}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Chave: </b>{{$search->license_key}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Ativo: </b>@if ($search->license_active == 1)
                        Sim
                    @else
                        Não
                    @endif</p>
                </li>
                <li class="list-group-item">
                    <p><b>Criado em:</b>{{$search->created_at}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Atualizado em:</b>{{$search->updated_at}}</p>
                </li>
            </ul>
        </div>
    </div>
@stop