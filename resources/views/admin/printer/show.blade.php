@extends('adminlte::page')

@section('title', 'Printer')

@section('content_header')
    <h1>Impressora</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <a href="{{route('printer.create')}}" class="btn btn-primary" data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i></a>
            <a href="{{route('printer.edit', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
            @if ($search->printer_active == 1)
                <a href="{{route('printer.deactive', "$search->id")}}" class="btn btn-primary" data-toggle="tooltip" title="Desativar"><i class="fa fa-close"></i></a>
            @else
                <a href="{{route('printer.active', "$search->id")}}" class="btn btn-primary" data-toggle="tooltip" title="Ativar"><i class="fa fa-check"></i></a>
            @endif
        </div>
        <div class="box-body">
            <ul class="list-group text-center">
                <li class="list-group-item">
                    <p><b>ID: </b>{{$search->id}}</p>
                </li>
                <li class="list-group-item">
                        <p><b>Colorido: </b>@if ($search->printer_color == 1)
                            Sim
                        @else
                            Não
                        @endif</p>
                </li>
                <li class="list-group-item">
                        <p><b>A3: </b>@if ($search->printer_a3 == 1)
                            Sim
                        @else
                            Não
                        @endif</p>
                </li>
                <li class="list-group-item">
                    <p><b>Valor: </b>{{$search->printer_value}}</p>
                </li>
                <li class="list-group-item">
                        <p><b>Ativo: </b>@if ($search->printer_active == 1)
                            Sim
                        @else
                            Não
                        @endif</p>
                </li>
                <li class="list-group-item">
                    <p><b>Cadastrado em: </b>{{$search->created_at}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Atualizado em: </b>{{$search->updated_at}}</p>
                </li>
            </ul>
        </div>
    </div>
@stop