@extends('adminlte::page')

@section('title', 'Computador')

@section('content_header')
    <h1>Computadores</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group">
                        <a href="{{route('hardware.create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
                        <button type="button" id="searchButton" class="btn btn-primary" data-toggle="modal" data-target="#modalSearch" title="Buscar"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Especificação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hardwares as $hardware)
                            <tr>
                                <td>{{$hardware->id}}</td>
                                <td>{{$hardware->hardware_type}}</td>
                                <td>{{$hardware->hardware_model}}</td>
                                <td>{{$hardware->hardware_specification}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('hardware.show', "$hardware->id")}}">Visualizar</a></li>
                                            <li><a href="{{route('hardware.edit', "$hardware->id")}}">Editar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('.data-table').dataTable();
        });
    </script>
@stop